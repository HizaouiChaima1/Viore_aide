<?php

namespace App\Services;

use App\Contracts\StatusStrategyInterface;
use App\Models\Categorie;
use App\Services\Factories\ImageUploaderFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * GoF Pattern: Facade
 *
 * Fournit une interface unifiée pour les opérations CRUD sur les entités du menu.
 * Utilise maintenant le vrai Factory Method (ImageUploaderFactory) pour l'upload.
 */
class MenuService
{
    private StatusStrategyInterface $statusStrategy;
    private ImageUploaderFactory $imageFactory;

    /**
     * Le Creator (ImageUploaderFactory) est injecté — MenuService
     * ne connaît pas le ConcreteCreator utilisé (DIP respecté).
     */
    public function __construct(
        StatusStrategyInterface $statusStrategy,
        ImageUploaderFactory $imageFactory
    ) {
        $this->statusStrategy = $statusStrategy;
        $this->imageFactory = $imageFactory;
    }

    public function createEntity(
        string $modelClass,
        array $data,
        Request $request,
        ?string $categoryFieldName = null
    ): Model {
        // Factory Method — appel polymorphique via le Creator injecté
        $data['photo'] = $this->imageFactory->upload($request);

        if ($categoryFieldName && isset($data[$categoryFieldName])) {
            $parentClass = \App\Models\Categorie::class;
            if ($modelClass === \App\Models\Categorie::class) {
                $parentClass = \App\Models\Categoriep::class;
            } elseif ($modelClass === \App\Models\Optionmodif::class) {
                $parentClass = \App\Models\Modif::class;
            }

            $category = $parentClass::where('Nom', $data[$categoryFieldName])->firstOrFail();
            $foreignKey = 'categorie_id';
            if ($modelClass === \App\Models\Categorie::class) {
                $foreignKey = 'categoriep_id';
            } elseif ($modelClass === \App\Models\Optionmodif::class) {
                $foreignKey = 'modificateur_id';
            }

            $data[$foreignKey] = $category->id;
            unset($data[$categoryFieldName]);
        }

        return $modelClass::create($data);
    }

    public function updateEntity(
        Model $entity,
        array $data,
        Request $request,
        ?string $categoryFieldName = null
    ): Model {
        // Factory Method — même appel polymorphique pour la mise à jour
        $newPhoto = $this->imageFactory->upload($request);
        if ($newPhoto) {
            $data['photo'] = $newPhoto;
        }

        if ($categoryFieldName && isset($data[$categoryFieldName])) {
            $parentClass = \App\Models\Categorie::class;
            if ($entity instanceof \App\Models\Categorie) {
                $parentClass = \App\Models\Categoriep::class;
            } elseif ($entity instanceof \App\Models\Optionmodif) {
                $parentClass = \App\Models\Modif::class;
            }

            $category = $parentClass::where('Nom', $data[$categoryFieldName])->firstOrFail();
            $relationName = match (true) {
                $entity instanceof \App\Models\Optionmodif => 'modify',
                $entity instanceof \App\Models\Categorie => 'categoriesp',
                default => 'categorie',
            };

            if (method_exists($entity, $relationName)) {
                $entity->$relationName()->associate($category);
            }

            unset($data[$categoryFieldName]);
        }

        $entity->update($data);
        return $entity;
    }

    public function toggleStatus(Model $entity): void
    {
        $this->statusStrategy->toggle($entity);
    }

    public function softDelete(Model $entity): void
    {
        $entity->delete();
    }
    public function restore(Model $entity): void
    {
        $entity->restore();
    }
}