<?php
namespace App\Decorators;

use App\Contracts\ProduitInterface;
use App\Models\Optionmodif;

class OptionModifDecorator implements ProduitInterface
{
    public function __construct(
        private ProduitInterface $produit,
        private Optionmodif $option
    ) {}

    public function getPrix(): float
    {
        return $this->produit->getPrix() + (float) $this->option->prix_supplementaire;
    }

    public function getDescription(): string
    {
        return $this->produit->getDescription() . ' + ' . $this->option->Nom;
    }
}