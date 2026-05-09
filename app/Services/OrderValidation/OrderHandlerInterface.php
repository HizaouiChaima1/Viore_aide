<?php

namespace App\Services\OrderValidation;

use Illuminate\Http\Request;

interface OrderHandlerInterface
{
    public function setNext(OrderHandlerInterface $handler): OrderHandlerInterface;
    public function handle(Request $request, array $panier): ?array;
}
