<?php

namespace App\Services\OrderValidation;

use Illuminate\Http\Request;

class PanierNonVideHandler extends AbstractOrderHandler
{
    public function handle(Request $request, array $panier): ?array
    {
        if (empty($panier)) {
            return ['champ' => 'panier', 'message' => 'Votre panier est vide.'];
        }
        return $this->passToNext($request, $panier);
    }
}
