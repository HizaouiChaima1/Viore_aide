<?php

namespace App\Handlers;

use Illuminate\Http\Request;

/**
 * Patron Chain of Responsibility — Interface Handler
 *
 * Définit le contrat que chaque maillon de la chaîne doit respecter :
 *  - setNext() : lie le prochain handler
 *  - handle()  : traite la requête ou la passe au suivant
 */
interface OrderHandlerInterface
{
    /**
     * Définit le prochain handler dans la chaîne.
     * Retourne le handler passé pour permettre le chaînage fluide.
     */
    public function setNext(OrderHandlerInterface $handler): OrderHandlerInterface;

    /**
     * Traite la requête. Si la validation est OK, passe au handler suivant.
     * Retourne null si tout est valide, ou un tableau d'erreur si bloqué.
     */
    public function handle(Request $request, array $panier): ?array;
}
