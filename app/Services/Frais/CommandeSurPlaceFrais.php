<?php

namespace App\Services\Frais;

/**
 * Calcul des frais pour une commande sur place (GRASP : Polymorphisme)
 */
class CommandeSurPlaceFrais implements FraisCalculatorInterface
{
    public function calculerFrais(float $sousTotal): float
    {
        // Sur place : aucun frais supplémentaire, 
        // ou éventuellement une taxe de service fixe (ex: 0%)
        return 0.0;
    }
}
