<?php

namespace App\Contracts;

interface MenuComponent
{
    public function getNom(): string;
    public function getPrixTotal(): float;
    public function getNombreProduits(): int;
    public function afficher(int $niveau = 0): string;
}
