<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Categories';
    protected $fillable = ['Nom', 'photo', 'Categoriep', 'Référence', 'Produit', 'Combinaisons', 'Cartes_cadeau'];

    protected $primaryKey = 'id';
    public $incrementing = false;

    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }
    

    // Définir la relation avec la catégorie parente
    public function categoriesp()
    {
        return $this->belongsTo(Categoriep::class, 'categoriep_id');
    }

    public function cartefidelite()
    {
        return $this->hasMany(Carefidelite::class, 'Cartes_cadeau');
    }
    
    public function Combos()
    {
        return $this->hasMany(Combos::class, 'Combos');
    }



    protected static function booted()
    {
        static::deleting(function ($categorie) {
            Produit::where('categorie_id', $categorie->id) ->update(['deleted_at' => now(), 'updated_at' => now()]);
           cartefidelite::where('categorie_id', $categorie->id) ->update(['deleted_at' => now(), 'updated_at' => now()]);
            Combos::where('categorie_id', $categorie->id) ->update(['deleted_at' => now(), 'updated_at' => now()]);
        
        });
    }
}
