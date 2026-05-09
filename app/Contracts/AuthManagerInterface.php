<?php

namespace App\Contracts;

use App\Models\Employe;

interface AuthManagerInterface
{
    public function check(): bool;
    public function employee(): ?Employe;
    public function hasRole(string $role): bool;
    public function isAdmin(): bool;
    public function isCaissier(): bool;
    public function isCuisinier(): bool;
    public function isServeur(): bool;
    public function getRestaurantName(): ?string;
}
