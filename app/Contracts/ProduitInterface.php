<?php
namespace App\Contracts;

interface ProduitInterface
{
    public function getPrix(): float;
    public function getDescription(): string;
}