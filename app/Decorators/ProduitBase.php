<?php
namespace App\Decorators;

use App\Contracts\ProduitInterface;
use App\Models\produit;

class ProduitBase implements ProduitInterface
{
    public function __construct(private produit $produit) {}

    public function getPrix(): float
    {
        return (float) $this->produit->Prix;
    }

    public function getDescription(): string
    {
        return $this->produit->Nom;
    }
}