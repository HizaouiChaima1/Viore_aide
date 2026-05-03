<?php

namespace App\Services\Factories;

use App\Contracts\ImageUploaderInterface;

/**
 * GoF Factory Method — Rôle : ConcreteCreator 2
 *
 * Produit un uploader configuré pour les photos de profil des employés.
 * Stockage dans public/images/
 */
class ProfileImageFactory extends ImageUploaderFactory
{
    protected function createUploader(): ImageUploaderInterface
    {
        return new LocalImageUploader('images');
    }
}
