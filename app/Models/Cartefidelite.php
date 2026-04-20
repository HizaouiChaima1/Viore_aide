<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartefidelite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Cartes_fidelites';
    protected $fillable = ['Nom','photo','SKU','categorie_id', 'strategie_prix','Prix','code_barre', 'status'];

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
  protected $dates = ['deleted_at']; 

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->withTrashed();
    }

    protected static function booted()
    {
        static::saved(function ($Cartefidelite) {
            // Check if a Categorie is associated with the Produit
            if ($Cartefidelite->category) {
                // Increment the count in the corresponding Categorie record
                $Cartefidelite->category->increment('Cartes_cadeau');
            }
        });
    }

   
}