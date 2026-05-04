<?php

namespace App\Services\Strategies;

use App\Contracts\StatusStrategyInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * GoF Pattern: Strategy (implémentation concrète)
 * 
 * Stratégie pour les statuts utilisant des verbes ('activer' / 'inactiver').
 * Utilisée principalement pour les restaurants dans EmaillController.
 */
class VerbalStatusStrategy implements StatusStrategyInterface
{
    /**
     * Bascule le statut entre 'activer' et 'inactiver'.
     *
     * @param Model $entity
     * @return void
     */
    public function toggle(Model $entity): void
    {
        $field = isset($entity->status) ? 'status' : 'statut';
        
        // Logique spécifique à cette stratégie
        $entity->$field = ($entity->$field === 'activer') ? 'inactiver' : 'activer';
        
        $entity->save();
    }

    /**
     * @return string
     */
    public function getStatusField(): string
    {
        return 'status';
    }
}
