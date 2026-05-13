<?php

namespace App\Strategies;

use App\Contracts\StatusStrategyInterface;
use Illuminate\Database\Eloquent\Model;

// ── Stratégie pour Produit ──────────────────────────
class ProduitStatusStrategy implements StatusStrategyInterface
{
    public function toggle(Model $entity): void
    {
        $entity->status = ($entity->status === 'Actif') ? 'Inactif' : 'Actif';
        $entity->save();
    }

    public function getStatusField(): string
    {
        return 'status';
    }
}

// ── Stratégie pour Categorie ────────────────────────
class CategorieStatusStrategy implements StatusStrategyInterface
{
    public function toggle(Model $entity): void
    {
        $entity->statut = ($entity->statut === 'visible') ? 'masqué' : 'visible';
        $entity->save();
    }

    public function getStatusField(): string
    {
        return 'statut';
    }
}

// ── Stratégie pour Employe ──────────────────────────
class EmployeStatusStrategy implements StatusStrategyInterface
{
    public function toggle(Model $entity): void
    {
        $entity->actif = !$entity->actif;
        $entity->save();
    }

    public function getStatusField(): string
    {
        return 'actif';
    }
}