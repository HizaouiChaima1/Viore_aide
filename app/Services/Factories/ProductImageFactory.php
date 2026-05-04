<?php

namespace App\Services\Factories;

use App\Contracts\ImageUploaderInterface;

/**
 * GoF Factory Method — Rôle : ConcreteCreator 1
 *
 * Produit un uploader configuré pour les images de produits/catégories.
 * Stockage dans public/uploads/
 */
class ProductImageFactory extends ImageUploaderFactory
{
    protected function createUploader(): ImageUploaderInterface
    {
        return new LocalImageUploader('uploads');
    }
}
