<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Contracts\Cloneable;

class Combos extends Model implements Cloneable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'combos';
    protected $fillable = ['nom','photo','categorie_id', 'sku','code_barre','description'];

    protected $primaryKey = 'id'; 
    public $incrementing = false; 



    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->withTrashed();
    }

    protected static function booted()
    {
        static::saved(function ($Combos) {
            // Check if a Categorie is associated with the Produit
            if ($Combos->category) {
                // Increment the count in the corresponding Categorie record
                $Combos->category->increment('Combinaisons');
            }
        });
    }

public function cloneObject(): static
    {
        $clone = $this->replicate(); // copie tous les champs sauf l'ID
        $clone->nom = $this->nom . ' (copie)';
        $clone->save();
        return $clone;
    }

   
}