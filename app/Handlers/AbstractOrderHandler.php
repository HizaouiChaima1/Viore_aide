<?php

namespace App\Handlers;

use Illuminate\Http\Request;

/**
 * Patron Chain of Responsibility — Handler Abstrait
 *
 * Implémente la logique de chaînage commune à tous les handlers.
 * Chaque handler concret hérite de cette classe et implémente uniquement handle().
 *
 * Rôle GoF : BaseHandler
 */
abstract class AbstractOrderHandler implements OrderHandlerInterface
{
    private ?OrderHandlerInterface $nextHandler = null;

    /**
     * Lie le handler suivant et retourne ce handler (chaînage fluide).
     */
    public function setNext(OrderHandlerInterface $handler): OrderHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    /**
     * Passe la requête au handler suivant si elle existe.
     * Retourne null si la chaîne est terminée sans erreur.
     */
    protected function passToNext(Request $request, array $panier): ?array
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request, $panier);
        }
        return null; // Fin de la chaîne — tout est valide
    }
}
