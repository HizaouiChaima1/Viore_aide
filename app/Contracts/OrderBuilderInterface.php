<?php

namespace App\Contracts;

/**
 * GoF Pattern: Builder (Création)
 *
 * Interface pour le Builder de commandes.
 * Définit les étapes pour construire une commande complexe.
 */
interface OrderBuilderInterface
{
    /**
     * Initialise une nouvelle commande.
     *
     * @param int $restaurantId
     * @param int $userId
     * @return OrderBuilderInterface
     */
    public function createOrder(int $restaurantId, int $userId): OrderBuilderInterface;

    /**
     * Ajoute un produit à la commande.
     *
     * @param array $product
     * @return OrderBuilderInterface
     */
    public function addProduct(array $product): OrderBuilderInterface;

    /**
     * Définit l'heure d'arrivée.
     *
     * @param string $heureArrivee
     * @return OrderBuilderInterface
     */
    public function setHeureArrivee(string $heureArrivee): OrderBuilderInterface;

    /**
     * Applique une réduction.
     *
     * @param float $reduction
     * @return OrderBuilderInterface
     */
    public function applyReduction(float $reduction): OrderBuilderInterface;

    /**
     * Définit le statut de la commande.
     *
     * @param string $status
     * @return OrderBuilderInterface
     */
    public function setStatus(string $status): OrderBuilderInterface;

    /**
     * Construit et retourne la commande finale.
     *
     * @return array
     */
    public function build(): array;
}