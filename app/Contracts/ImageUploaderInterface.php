<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

/**
 * GoF Factory Method — Rôle : Product
 *
 * Contrat commun que tout uploader d'image doit respecter.
 * Le Creator (ImageUploaderFactory) produit des objets de ce type.
 */
interface ImageUploaderInterface
{
    /**
     * Stocke le fichier uploadé et retourne son chemin relatif.
     */
    public function store(UploadedFile $file): string;

    /**
     * Retourne le répertoire de stockage utilisé par cet uploader.
     */
    public function getDirectory(): string;
}