<?php

namespace App\Services\Frais;

/**
 * Interface pour le calcul des frais (GRASP : Polymorphisme)
 */
interface FraisCalculatorInterface
{
    /**
     * Calcule les frais supplémentaires (livraison, service, emballage, etc.)
     * 
     * @param float $sousTotal Le total du panier avant frais
     * @return float Le montant des frais à ajouter
     */
    public function calculerFrais(float $sousTotal): float;
}
