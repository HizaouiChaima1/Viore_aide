<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * Patron Proxy — Proxy (CachingProxy)
 *
 * Agit comme un intermédiaire devant ProduitRepository.
 * Il retient (mémorise) les résultats des requêtes SQL dans des
 * attributs privés pour éviter les requêtes répétées.
 *
 * Rôles GoF :
 *   - Subject          : ProduitRepositoryInterface
 *   - RealSubject      : ProduitRepository
 *   - Proxy            : ProduitRepositoryProxy  ← cette classe
 */
class ProduitRepositoryProxy implements ProduitRepositoryInterface
{
    private ProduitRepositoryInterface $realRepository;

    // Cache en mémoire — null = pas encore chargé
    private ?Collection $categoriesCache = null;
    private ?Collection $sousCategoriesCache = null;

    public function __construct(ProduitRepositoryInterface $realRepository)
    {
        // Le Proxy reçoit le vrai repository qu'il va intercepter
        $this->realRepository = $realRepository;
    }

    /**
     * Retourne les catégories depuis le cache.
     * Si le cache est vide, va chercher en DB via le RealSubject.
     */
    public function getCategories(): Collection
    {
        if ($this->categoriesCache === null) {
            // Cache manquant → on délègue au vrai repository (requête DB)
            $this->categoriesCache = $this->realRepository->getCategories();
        }

        // Cache disponible → retourne directement sans SQL
        return $this->categoriesCache;
    }

    /**
     * Retourne les sous-catégories depuis le cache.
     * Si le cache est vide, va chercher en DB via le RealSubject.
     */
    public function getSousCategories(): Collection
    {
        if ($this->sousCategoriesCache === null) {
            $this->sousCategoriesCache = $this->realRepository->getSousCategories();
        }

        return $this->sousCategoriesCache;
    }
}
