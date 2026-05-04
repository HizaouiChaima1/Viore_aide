<?php

namespace App\Services\Factories;

use App\Contracts\ImageUploaderInterface;

/**
 * GoF Factory Method — Rôle : ConcreteCreator 3
 *
 * Produit un uploader configuré pour les photos des restaurants partenaires.
 * Stockage dans public/restaurants/
 */
class RestaurantImageFactory extends ImageUploaderFactory
{
    protected function createUploader(): ImageUploaderInterface
    {
        return new LocalImageUploader('restaurants');
    }
}
