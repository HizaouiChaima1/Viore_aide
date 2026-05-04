<?php

namespace App\Handlers;

use Illuminate\Http\Request;

/**
 * Patron Chain of Responsibility — Handler Concret #1
 *
 * Responsabilité : Vérifie que le panier n'est pas vide.
 * Une commande sans produits n'a aucun sens métier.
 */
class PanierNonVideHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        if (empty($panier)) {
            // Bloque la chaîne — retourne une erreur
            return [
                'champ'   => 'panier',
                'message' => 'Impossible de valider une commande avec un panier vide.',
            ];
        }

        // Panier OK — passe au handler suivant
        return $this->passToNext($request, $panier);
    }
}
