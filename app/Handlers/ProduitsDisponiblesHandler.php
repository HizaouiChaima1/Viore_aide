<?php

namespace App\Handlers;

use Illuminate\Http\Request;
use App\Models\Produit;

/**
 * Patron Chain of Responsibility — Handler Concret #3
 *
 * Responsabilité : Vérifie que tous les produits du panier existent
 * encore en base de données et sont actifs.
 * Évite les commandes avec des produits supprimés ou désactivés.
 */
class ProduitsDisponiblesHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        foreach ($panier as $productId => $item) {
            $produit = Produit::find($productId);

            if (!$produit) {
                return [
                    'champ'   => 'produits',
                    'message' => "Le produit \"{$item['product']->Nom}\" n'existe plus dans le catalogue.",
                ];
            }

            if (isset($produit->status) && $produit->status === 'Inactif') {
                return [
                    'champ'   => 'produits',
                    'message' => "Le produit \"{$produit->Nom}\" est actuellement indisponible.",
                ];
            }
        }

        // Tous les produits sont valides — fin de la chaîne
        return $this->passToNext($request, $panier);
    }
}
