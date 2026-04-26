<?php
namespace App\Reports;

abstract class AbstractReport
{
    /**
     * Template Method — squelette fixe de l'algorithme
     * L'ordre des etapes ne change jamais.
     */
    final public function generer(int $restaurantId): array
    {
        $donnees  = $this->recupererDonnees($restaurantId); // etape 1
        $donnees  = $this->filtrer($donnees);               // etape 2
        $resultat = $this->formater($donnees);              // etape 3
        return $resultat;
    }

    // Etapes abstraites — chaque sous-classe les definit
    abstract protected function recupererDonnees(int $restaurantId): array;
    abstract protected function formater(array $donnees): array;

    // Hook — etape optionnelle avec comportement par defaut
    protected function filtrer(array $donnees): array
    {
        return $donnees; // par defaut : aucun filtre
    }
}