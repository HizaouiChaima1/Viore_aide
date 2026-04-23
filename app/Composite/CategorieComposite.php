<?php

namespace App\Composite;

use App\Contracts\MenuComponent;
use App\Models\Categorie;

class CategorieComposite implements MenuComponent
{
    /** @var MenuComponent[] */
    private array $enfants = [];

    public function __construct(private Categorie $categorie)
    {
        // Charger automatiquement les produits comme feuilles
        foreach ($categorie->produits as $produit) {
            $this->enfants[] = new ProduitLeaf($produit);
        }
    }

    public function getNom(): string
    {
        return $this->categorie->Nom;
    }

    public function getPrixTotal(): float
    {
        // Délègue aux enfants — le Composite ne calcule pas lui-même
        return array_sum(
            array_map(fn($e) => $e->getPrixTotal(), $this->enfants)
        );
    }

    public function getNombreProduits(): int
    {
        return array_sum(
            array_map(fn($e) => $e->getNombreProduits(), $this->enfants)
        );
    }

    public function afficher(int $niveau = 0): string
    {
        $indent = str_repeat('  ', $niveau);
        $result = "{$indent}📂 {$this->categorie->Nom} ({$this->getNombreProduits()} produits)\n";

        foreach ($this->enfants as $enfant) {
            $result .= $enfant->afficher($niveau + 1);
        }

        return $result;
    }
}
