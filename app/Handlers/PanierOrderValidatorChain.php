<?php

namespace App\Handlers;

use App\Contracts\PanierOrderValidatorInterface;
use Illuminate\Http\Request;

/**
 * Chain of Responsibility composée — point unique de composition des handlers.
 */
class PanierOrderValidatorChain implements PanierOrderValidatorInterface
{
    private OrderHandlerInterface $head;

    public function __construct()
    {
        $first = new PanierNonVideHandler();
        $first->setNext(new PrixValideHandler())
            ->setNext(new ProduitsDisponiblesHandler());
        $this->head = $first;
    }

    public function validate(Request $request, array $panier): ?array
    {
        return $this->head->handle($request, $panier);
    }
}
