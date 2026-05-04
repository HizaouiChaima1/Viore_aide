<?php

namespace App\Models;

use App\Contracts\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Produit extends Model implements Cloneable
{
    use HasFactory, SoftDeletes;

    protected $table = 'produits';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'Nom',
        'photo',
        'Produit_en_stock',
        'SKU',
        'Prix',
        'Groupe_impot',
        'Méthode_vente',
        'status',
        'categorie_id',
        'code_à_barre',
        'temp_preperation',
        'calories',
        'description'
    ];

    /**
     * PROTOTYPE — crée une copie indépendante de ce produit.
     * Le clone est un nouvel objet non persisté, prêt à être
     * modifié puis sauvegardé séparément.
     */
    public function cloner(): static
    {
        $clone = $this->replicate(); // copie tous les attributs

        // Nouveau id UUID unique
        $clone->id = (string) Str::uuid();

        // Nouveau SKU unique basé sur l'original
        $clone->SKU = $this->SKU . '-COPY-' . strtoupper(Str::random(4));

        // Nom explicite pour distinguer le clone
        $clone->Nom = 'Copie de ' . $this->Nom;

        // Le clone est inactif par défaut — l'admin doit le valider
        $clone->status = 'Inactif';

        // Réinitialiser les timestamps
        $clone->created_at = null;
        $clone->updated_at = null;

        return $clone; // pas encore sauvegardé en base
    }

    // ── relations et méthodes existantes inchangées ──────────────────

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->withTrashed();
    }

    public static function findById($id)
    {
        return self::findOrFail($id);
    }

    public function commands()
    {
        return $this->belongsToMany(Commands::class);
    }

    protected static function booted()
    {
        static::saved(function ($produit) {
            if ($produit->categorie) {
                $produit->categorie->increment('Produit');
            }
        });
    }
}
