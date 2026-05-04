<?php

namespace App\Services\Factories;

use App\Contracts\ImageUploaderInterface;
use Illuminate\Http\Request;

/**
 * GoF Factory Method — Rôle : Creator (abstrait)
 *
 * Définit le squelette de l'opération d'upload.
 * La méthode abstraite createUploader() est surchargée par chaque
 * ConcreteCreator pour produire le bon type d'uploader.
 *
 * Selon Gamma et al. (Design Patterns, p. 107) :
 * "Define an interface for creating an object, but let subclasses
 *  decide which class to instantiate."
 */
abstract class ImageUploaderFactory
{
    /**
     * Factory Method — méthode abstraite surchargée par les sous-classes.
     * C'est ici que réside le polymorphisme GoF.
     */
    abstract protected function createUploader(): ImageUploaderInterface;

    /**
     * Opération template qui utilise le produit créé par factoryMethod().
     * Le Creator ne connaît pas le ConcreteProduct — il dépend uniquement
     * de l'interface ImageUploaderInterface.
     *
     * @param Request $request
     * @param string  $fieldName  Nom du champ fichier dans la requête
     * @return string|null        Chemin relatif ou null si pas de fichier
     */
    public function upload(Request $request, string $fieldName = 'photo'): ?string
    {
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $uploader = $this->createUploader(); // appel polymorphique
        return $uploader->store($request->file($fieldName));
    }
}