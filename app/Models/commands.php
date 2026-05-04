<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class commands extends Model
{
    use HasFactory;

    protected $table = 'commands';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'branch',
        'type_commande',
        'client',
        'status',
        'heure_arrivee',
        'notes_ticket',
        'notes_cuisine',
        'total_price',
        'produits',
    ];

    /**
     * GRASP: Information Expert
     * Le cast 'array' gère automatiquement la conversion JSON <-> array.
     */
    protected $casts = [
        'produits' => 'array',
        'heure_arrivee' => 'datetime',
    ];

    /**
     * Valeurs autorisées pour type_commande.
     * Correspond à la contrainte OCL :
     *   inv typeCommandeValide:
     *     Set{'sur place','a emporter','livraison','branche1'}
     *       ->includes(self.type_commande)
     */
    private const TYPES_AUTORISES = [
        'sur place',
        'a emporter',
        'À emporter', // Ajout de la variante avec accent
        'livraison',
        'branche1',
    ];

    protected static function boot()
    {
        parent::boot();

        // ── Génération de l'ID aléatoire (comportement original) ──────────
        static::creating(function ($model) {
            $model->id = Str::random(7);
        });

        // ══════════════════════════════════════════════════════════════════
        // OCL — Invariants vérifiés avant toute création ET modification
        // ══════════════════════════════════════════════════════════════════
        $invariants = function ($model) {

            // inv totalPositif : self.total_price > 0
            if (is_null($model->total_price) || $model->total_price <= 0) {
                throw new \InvalidArgumentException(
                    '[OCL inv totalPositif] Le total_price doit être strictement positif.'
                );
            }

            // inv typeCommandeValide :
            //   Set{...}->includes(self.type_commande)
            if (
                $model->type_commande !== null
                && !in_array($model->type_commande, self::TYPES_AUTORISES, true)
            ) {
                throw new \InvalidArgumentException(
                    '[OCL inv typeCommandeValide] type_commande invalide : '
                    . $model->type_commande
                    . '. Valeurs autorisées : '
                    . implode(', ', self::TYPES_AUTORISES)
                );
            }

            // inv produitsNonVide : self.produits->notEmpty()
            if (empty($model->produits)) {
                throw new \InvalidArgumentException(
                    '[OCL inv produitsNonVide] Une commande doit contenir au moins un produit.'
                );
            }
        };

        static::creating($invariants);
        static::updating($invariants);
    }

    public function produitsList()
    {
        return $this->belongsToMany(Produit::class);
    }
}