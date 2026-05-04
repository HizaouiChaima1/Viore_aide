<?php

namespace App\Repositories;

use App\Models\Categoriep;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

/**
 * Patron Proxy — RealSubject
 *
 * C'est le "vrai" repository qui fait les requêtes SQL.
 * Le Proxy l'appellera uniquement si les données ne sont pas en cache.
 */
class ProduitRepository implements ProduitRepositoryInterface
{
    /**
     * Requête SQL réelle : SELECT * FROM categoriesp
     */
    public function getCategories(): Collection
    {
        return Categoriep::all();
    }

    /**
     * Requête SQL réelle : SELECT * FROM categories
     */
    public function getSousCategories(): Collection
    {
        return Categorie::all();
    }
}
