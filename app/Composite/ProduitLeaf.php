<?php

namespace App\Composite;

use App\Contracts\MenuComponent;
use App\Models\Produit;

class ProduitLeaf implements MenuComponent
{
    public function __construct(private Produit $produit) {}

    public function getNom(): string
    {
        return $this->produit->Nom;
    }

    public function getPrixTotal(): float
    {
        // Un produit seul retourne son propre prix
        return (float) $this->produit->Prix;
    }

    public function getNombreProduits(): int
    {
        // Une feuille = 1 produit
        return 1;
    }

    public function afficher(int $niveau = 0): string
    {
        $indent = str_repeat('  ', $niveau);
        return "{$indent}🍽️ {$this->produit->Nom} — {$this->produit->Prix} €\n";
    }
}
