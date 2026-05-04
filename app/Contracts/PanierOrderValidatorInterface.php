<?php

namespace App\Contracts;

use Illuminate\Http\Request;

/**
 * Contrat de validation du panier avant enregistrement d'une commande.
 * DIP : les contrôleurs dépendent de cette abstraction, pas des handlers concrets.
 */
interface PanierOrderValidatorInterface
{
    /**
     * @return null si valide ; tableau avec clés champ + message sinon
     */
    public function validate(Request $request, array $panier): ?array;
}
