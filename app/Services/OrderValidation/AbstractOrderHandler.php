<?php

namespace App\Services\OrderValidation;

use Illuminate\Http\Request;

abstract class AbstractOrderHandler implements OrderHandlerInterface
{
    private ?OrderHandlerInterface $nextHandler = null;

    public function setNext(OrderHandlerInterface $handler): OrderHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    protected function passToNext(Request $request, array $panier): ?array
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request, $panier);
        }
        return null;
    }
}
