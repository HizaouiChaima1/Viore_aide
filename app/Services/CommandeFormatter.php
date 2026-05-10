<?php

namespace App\Services;

use App\Models\Commands;
use Illuminate\Support\Collection;

/**
 * GRASP — Pure Fabrication
 *
 * CommandeFormatter est une classe artificielle qui n'existe pas
 * dans le domaine métier (ce n'est ni un Restaurant, ni un Employé,
 * ni une Commande). Elle est créée uniquement pour améliorer la
 * cohésion et décharger OrdersController de toute responsabilité
 * de formatage et de calcul statistique.
 *
 * AVANT : OrdersController mélangait récupération des données,
 *         formatage et calculs dans les mêmes méthodes.
 * APRÈS : OrdersController délègue tout le formatage à cette classe.
 */
class CommandeFormatter
{
    /**
     * Formate une collection de commandes pour l'affichage
     * dans le tableau de bord admin (vue ordres).
     * 
     * AVANT (dans OrdersController::index()) :
     *   foreach ($cmds as $command) {
     *       $command->randomId = Str::random(7);
     *   }
     * 
     * APRÈS : délégué ici
     */
    public function formaterPourDashboard(Collection $commandes): Collection
    {
        return $commandes->map(function ($commande) {
            $commande->randomId     = \Illuminate\Support\Str::random(7);
            $commande->resumeProduits = $this->getResume($commande);
            $commande->nbArticles   = $this->getNombreArticles($commande);
            $commande->labelStatut  = $this->getLabelStatut($commande->status);
            return $commande;
        });
    }

    /**
     * Génère un résumé lisible des produits d'une commande.
     * Ex: "Tiramisu x2, Pizza x1"
     */
    public function getResume(Commands $commande): string
    {
        if (empty($commande->produits)) return 'Commande vide';

        return implode(', ', array_map(
            fn($p) => $p['nom'] . ' x' . $p['quantite'],
            $commande->produits
        ));
    }

    /**
     * Calcule le nombre total d'articles dans une commande.
     */
    public function getNombreArticles(Commands $commande): int
    {
        if (empty($commande->produits)) return 0;

        return array_sum(
            array_map(fn($p) => (int) $p['quantite'], $commande->produits)
        );
    }

    /**
     * Retourne un label lisible pour le statut de la commande.
     */
    public function getLabelStatut(?string $status): string
    {
        return match ($status) {
            'Traité'     => '✔ Traité',
            'Non Traité' => '✘ En attente',
            default      => '— Inconnu',
        };
    }

    /**
     * Calcule les statistiques globales pour le dashboard.
     * Ex: total des ventes, nombre de commandes traitées.
     */
    public function getStatistiques(Collection $commandes): array
    {
        return [
            'total_commandes' => $commandes->count(),
            'traitees'        => $commandes->where('status', 'Traité')->count(),
            'en_attente'      => $commandes->where('status', 'Non Traité')->count(),
            'chiffre_affaires' => $commandes->sum('total_price'),
        ];
    }

    /**
     * Formate une commande pour l'export CSV.
     * Retourne un tableau de lignes prêtes à écrire.
     */
    public function exporterCSV(Collection $commandes): string
    {
        $lignes = ["ID,Client,Type,Total,Statut,Produits\n"];

        foreach ($commandes as $cmd) {
            $lignes[] = implode(',', [
                $cmd->id,
                $cmd->client ?? 'Anonyme',
                $cmd->type_commande,
                $cmd->total_price,
                $cmd->status,
                '"' . $this->getResume($cmd) . '"',
            ]) . "\n";
        }

        return implode('', $lignes);
    }
}
