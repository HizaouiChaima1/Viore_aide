<?php

namespace App\Services\OrderValidation;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitsDisponiblesHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        $productIds = array_keys($panier);
        
        // Optimisation : Une seule requête SQL pour tous les produits (évite le N+1)
        $produits = Produit::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($productIds as $productId) {
            $produit = $produits->get($productId);
            
            if (!$produit) {
                return ['champ' => 'produits', 'message' => "Un produit sélectionné n'existe plus."];
            }
            
            if ($produit->status === 'Inactif') {
                return ['champ' => 'produits', 'message' => "Le produit {$produit->Nom} est actuellement indisponible."];
            }
        }
        
        return $this->passToNext($request, $panier);
    }
}
