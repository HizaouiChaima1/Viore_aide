<?php

namespace App\Services\Frais;

/**
 * Calcul des frais pour une commande en livraison (GRASP : Polymorphisme)
 */
class CommandeLivraisonFrais implements FraisCalculatorInterface
{
    public function calculerFrais(float $sousTotal): float
    {
        // Livraison : On ajoute 10% du sous-total + 5.00 de frais fixes de livraison
        return ($sousTotal * 0.10) + 5.00;
    }
}
