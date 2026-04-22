<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * GoF Pattern: Factory Method (variante Static Factory pour Laravel)
 * 
 * Cette classe centralise la logique de création et de gestion des fichiers images.
 * Elle permet d'isoler la logique de stockage (chemin, nom de fichier) hors des contrôleurs.
 */
class PhotoFactory
{
    /**
     * Crée (uploade) une nouvelle photo et retourne son chemin.
     *
     * @param Request $request
     * @param string $fieldName Nom du champ dans la requête (par défaut 'photo')
     * @param string $directory Répertoire de stockage (par défaut 'uploads')
     * @return string|null Le chemin de la photo ou null si aucun fichier n'est présent
     */
    public static function create(Request $request, string $fieldName = 'photo', string $directory = 'uploads'): ?string
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            
            // Génération d'un nom unique pour éviter les collisions
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Stockage dans le répertoire public
            $file->move(public_path($directory), $fileName);
            
            return $directory . '/' . $fileName;
        }

        return null;
    }

    /**
     * Met à jour une photo existante (alias de create dans cette implémentation simplifiée).
     * Dans une version plus complexe, elle pourrait supprimer l'ancienne photo.
     *
     * @param Request $request
     * @param string $fieldName
     * @return string|null
     */
    public static function update(Request $request, string $fieldName = 'photo'): ?string
    {
        return self::create($request, $fieldName);
    }
}
