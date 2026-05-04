<?php

namespace App\Handlers;

use Illuminate\Http\Request;

/**
 * Patron Chain of Responsibility — Handler Concret #2
 *
 * Responsabilité : Vérifie que le total de la commande est valide (positif et non nul).
 * Un total à 0 ou négatif indique une erreur de calcul côté client.
 */
class PrixValideHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        $total = $request->input('total') ?? $request->input('total_price');

        if (is_null($total) || !is_numeric($total) || floatval($total) <= 0) {
            // Bloque la chaîne — montant invalide
            return [
                'champ'   => 'total',
                'message' => 'Le montant total de la commande doit être supérieur à 0.',
            ];
        }

        // Prix OK — passe au handler suivant
        return $this->passToNext($request, $panier);
    }
}
