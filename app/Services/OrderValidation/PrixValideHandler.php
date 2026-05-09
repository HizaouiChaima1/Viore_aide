<?php

namespace App\Services\OrderValidation;

use Illuminate\Http\Request;

class PrixValideHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        $total = $request->input('total') ?? $request->input('total_price');
        if (is_null($total) || floatval($total) <= 0) {
            return ['champ' => 'total', 'message' => 'Le montant total de la commande est invalide.'];
        }
        return $this->passToNext($request, $panier);
    }
}
