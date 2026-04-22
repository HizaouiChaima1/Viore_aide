<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface StatusStrategyInterface
{
    /**
     * Change le statut d'une entité.
     *
     * @param Model $entity L'entité dont le statut doit être changé
     * @return void
     */
    public function toggle(Model $entity): void;

    /**
     * Retourne le champ de statut utilisé par cette stratégie.
     *
     * @return string
     */
    public function getStatusField(): string;
}
