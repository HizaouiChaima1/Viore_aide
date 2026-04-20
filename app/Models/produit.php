<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{use HasFactory;
    use SoftDeletes;

    protected $table = 'produits';
    protected $fillable = ['Nom','photo','Produit_en_stock', 'SKU', 'Prix', 'Groupe_impot','Méthode_vente', 'status', 'categorie_id','code_à_barre','temp_preperation','calories','description'];

    // Utilisation de la clé primaire par défaut
    protected $primaryKey = 'id';

    // Activation/désactivation de l'incrémentation automatique
    public $incrementing = false;

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->withTrashed();
    }


    public static function findById($id)
    {
        // Utilisez la méthode findOrFail pour rechercher le produit par son ID
        return self::findOrFail($id);
    }
    public function commands()
{
    return $this->belongsToMany(Commands::class);
}


protected static function booted()
{
    static::saved(function ($produit) {
        // Check if a Categorie is associated with the Produit
        if ($produit->categorie) {
            // Increment the count in the corresponding Categorie record
            $produit->categorie->increment('Produit');
        }
    });
}

}