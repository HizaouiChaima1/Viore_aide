<?php

namespace App\Services\Factories;

use App\Contracts\ImageUploaderInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * GoF Factory Method — Rôle : ConcreteProduct
 *
 * Implémentation concrète de l'upload local vers le dossier public/.
 * Le répertoire cible est injecté à la construction par le ConcreteCreator.
 */
class LocalImageUploader implements ImageUploaderInterface
{
    public function __construct(private string $directory) {}

    /**
     * Génère un nom unique, déplace le fichier et retourne le chemin relatif.
     */
    public function store(UploadedFile $file): string
    {
        $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($this->directory), $fileName);
        return $this->directory . '/' . $fileName;
    }

    public function getDirectory(): string
    {
        return $this->directory;
    }
}
