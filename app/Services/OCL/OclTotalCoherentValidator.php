<?php

namespace App\Services\OCL;

use App\Models\Commands;
use App\Services\Frais\CommandeLivraisonFrais;
use App\Services\Frais\CommandeEmporterFrais;
use App\Services\Frais\CommandeSurPlaceFrais;

/**
 * Implémentation de la contrainte OCL C6 :
 *
 * context commands::save() : OclVoid
 * post TotalAvecFraisCoherent:
 *   let sousTotal : Real =
 *     self.produits->iterate(p : Produit ; acc : Real = 0.0 |
 *       acc + (p.Prix * p.quantite)
 *     )
 *   in
 *   self.type_commande = 'livraison' implies
 *       self.total_price = sousTotal + fraisLivraison(sousTotal)
 *   and
 *   self.type_commande = 'emporter' implies
 *       self.total_price = sousTotal + fraisEmporter(sousTotal)
 *   and
 *   (autre) implies
 *       self.total_price = sousTotal + 0.0
 */
class OclTotalCoherentValidator
{
    /**
     * OCL : self.produits->iterate(p ; acc = 0.0 | acc + p.Prix * p.quantite)
     *
     * Calcule le sous-total attendu en parcourant la liste des produits
     * exactement comme ->iterate() le ferait en OCL.
     *
     * @param  array  $produits  Tableau de produits avec 'prix_unitaire' et 'quantite'
     * @return float             Sous-total calculé
     */
    public function calculerSousTotal(array $produits): float
    {
        // OCL : acc = 0.0  (valeur initiale de l'accumulateur)
        $acc = 0.0;

        // OCL : ->iterate(p : Produit ; acc : Real = 0.0 | acc + p.Prix * p.quantite)
        foreach ($produits as $p) {
            $acc = $acc + ($p['prix_unitaire'] * $p['quantite']);
        }

        return $acc;
    }

    /**
     * OCL : post TotalAvecFraisCoherent
     *
     * Vérifie que le total_price stocké dans la commande est cohérent
     * avec la somme réelle des produits + les frais du type de commande.
     *
     * Lève une \LogicException si la postcondition OCL est violée.
     *
     * @param  Commands  $command   La commande après construction
     * @param  array     $produits  Les produits formatés du panier
     * @throws \LogicException      Si la contrainte OCL C6 est violée
     */
    public function verifierPostcondition(Commands $command, array $produits): void
    {
        // OCL : let sousTotal = self.produits->iterate(...)
        $sousTotal = $this->calculerSousTotal($produits);

        // OCL : match sur self.type_commande (if-then-else OCL)
        $calculateur = match($command->type_commande) {
            'livraison' => new CommandeLivraisonFrais(),
            'emporter'  => new CommandeEmporterFrais(),
            default     => new CommandeSurPlaceFrais(),
        };

        $frais = $calculateur->calculerFrais($sousTotal);

        // OCL : totalAttendu = sousTotal + frais
        $totalAttendu = round($sousTotal + $frais, 2);
        $totalStocke  = round((float) $command->total_price, 2);

        // OCL : self.total_price = sousTotal + frais  (postcondition)
        if ($totalStocke !== $totalAttendu) {
            throw new \LogicException(
                "[OCL C6 — TotalAvecFraisCoherent] Violation de postcondition : " .
                "total_price={$totalStocke} ≠ sousTotal({$sousTotal}) + frais({$frais}) = {$totalAttendu}."
            );
        }
    }
}
