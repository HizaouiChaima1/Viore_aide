<?php

namespace App\Composite;

use App\Contracts\MenuComponent;
use App\Models\Categoriep;

class CategoriepComposite implements MenuComponent
{
    /** @var MenuComponent[] */
    private array $enfants = [];

    public function __construct(private Categoriep $categoriep)
    {
        // Charger les sous-catégories comme nœuds composites
        foreach ($categoriep->categories as $categorie) {
            $this->enfants[] = new CategorieComposite($categorie);
        }
    }

    public function getNom(): string
    {
        return $this->categoriep->Nom;
    }

    public function getPrixTotal(): float
    {
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
        $result = "{$indent}📁 {$this->categoriep->Nom} — Total: {$this->getPrixTotal()} €\n";

        foreach ($this->enfants as $enfant) {
            $result .= $enfant->afficher($niveau + 1);
        }

        return $result;
    }
}
