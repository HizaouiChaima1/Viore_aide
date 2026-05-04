<?php

namespace App\Contracts;

interface Cloneable
{
    public function cloner(): static;
}
