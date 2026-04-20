<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorieP extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'Categoriesp';
    protected $fillable = ['Nom', 'photo', 'Référence'];

    protected $primaryKey = 'id';
    public $incrementing = false;

    // Définir la relation avec les catégories enfants
    public function categories()
    {
        return $this->hasMany(Categorie::class, 'categoriep_id');
    }

    // Boot method to handle cascading deletes
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($categoriep) {
            $categoriep->categories()->delete();
        });
    }
    
}
