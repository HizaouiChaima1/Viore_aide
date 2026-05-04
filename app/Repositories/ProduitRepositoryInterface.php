<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * Patron Proxy — Interface Subject
 *
 * Définit le contrat commun entre le vrai repository (RealSubject)
 * et le proxy. Le contrôleur ne connaît que cette interface.
 */
interface ProduitRepositoryInterface
{
    /**
     * Retourne toutes les catégories parentes (Categoriep).
     */
    public function getCategories(): Collection;

    /**
     * Retourne toutes les sous-catégories (Categorie).
     */
    public function getSousCategories(): Collection;
}
