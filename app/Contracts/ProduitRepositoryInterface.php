<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ProduitRepositoryInterface
{
    public function getCategories(): Collection;
    public function getSousCategories(): Collection;
}
