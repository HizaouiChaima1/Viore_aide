<?php

namespace App\Services\Frais;

/**
 * Calcul des frais pour une commande à emporter (GRASP : Polymorphisme)
 */
class CommandeEmporterFrais implements FraisCalculatorInterface
{
    public function calculerFrais(float $sousTotal): float
    {
        // À emporter : On ajoute un frais fixe pour l'emballage (ex: 2.50)
        return 2.50;
    }
}
