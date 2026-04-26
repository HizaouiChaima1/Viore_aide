<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commands;
use App\Reports\CaisseReport;      // ← ajouter
use App\Reports\CommandesReport;

/**
 * Patron Template Method — Classe concrète pour la caisse
 *
 * Rôle : ConcreteClass
 * Hérite du squelette d'algorithme de AbstractPanierController
 * et implémente uniquement les étapes spécifiques à l'interface caissier.
 */
class CaisseController extends AbstractPanierController
{
    /**
     * Clé de session du panier caisse.
     */
    protected function getSessionKey(): string
    {
        return 'cass';
    }

    /**
     * Source de la commande : initiée depuis l'interface caissier.
     */
    protected function getSource(): string
    {
        return 'caissier';
    }

    /**
     * Validation spécifique au formulaire de la caisse.
     * Champs supplémentaires : branch, type_commande, notes_ticket, notes_cuisine.
     */
    protected function validerDonnees(Request $request): array
    {
        return $request->validate([
            'branch'         => 'required|string',
            'type_commande'  => 'required|string',
            'client'         => 'nullable|string',
            'total_price'    => 'required|numeric',
            'heure_arrivee'  => 'required|date',
            'notes_ticket'   => 'nullable|string',
            'notes_cuisine'  => 'nullable|string',
            'produits'       => 'required|array',
        ]);
    }

    /**
     * Construction de la commande avec les champs propres à la caisse.
     * Inclut branch, type_commande et les notes cuisine/ticket.
     */
    protected function construireCommande(array $data, array $produits): Commands
    {
        $command = new Commands();
        $command->branch         = $data['branch'];
        $command->type_commande  = $data['type_commande'];
        $command->client         = $data['client'] ?? null;
        $command->total_price    = $data['total_price'];
        $command->heure_arrivee  = $data['heure_arrivee'];
        $command->notes_ticket   = $data['notes_ticket'] ?? null;
        $command->notes_cuisine  = $data['notes_cuisine'] ?? null;

        return $command;
    }

    /**
     * Point d'entrée pour ajouter un produit au panier caisse.
     * Délégué à la méthode template de la classe abstraite.
     */
    public function add(Request $request)
    {
        return $this->ajouterProduit($request);
    }

    public function rapportCaisse(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');

        $report  = new CaisseReport();
        $data    = $report->generer($restaurantId);

        return response()->json($data);
    }

    public function rapportCommandes(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');

        $report = new CommandesReport();
        $data   = $report->generer($restaurantId);

        return response()->json($data);
    }
}
