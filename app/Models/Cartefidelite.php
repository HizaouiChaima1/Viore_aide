<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartefidelite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Cartes_fidelites';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'Nom',
        'photo',
        'SKU',
        'categorie_id',
        'strategie_prix',
        'Prix',
        'code_barre',
        'status',
    ];

    /**
     * Valeurs de statut gérées par ActiveInactiveStrategy.
     * Correspond à la contrainte OCL :
     *   inv statutValide:
     *     Set{'Actif','Inactif'}->includes(self.status)
     *
     * Postcondition toggle :
     *   post toggleInverse:
     *     (self.status@pre = 'Actif'  implies self.status = 'Inactif')
     *     and
     *     (self.status@pre = 'Inactif' implies self.status = 'Actif')
     *   → vérifiée dans ActiveInactiveStrategy::toggle()
     */
    private const STATUTS_AUTORISES = ['Actif', 'Inactif'];

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')
            ->withTrashed();
    }

    protected static function boot()
    {
        parent::boot();

        // ══════════════════════════════════════════════════════════════════
        // OCL — Invariants vérifiés avant toute création ET modification
        // ══════════════════════════════════════════════════════════════════
        $invariants = function ($carte) {

            // inv prixPositif : self.Prix > 0
            if (is_null($carte->Prix) || $carte->Prix <= 0) {
                throw new \InvalidArgumentException(
                    '[OCL inv prixPositif] Le Prix d\'une carte de fidélité '
                    . 'doit être strictement positif.'
                );
            }

            // inv categorieObligatoire : self.categorie <> null
            if (empty($carte->categorie_id)) {
                throw new \InvalidArgumentException(
                    '[OCL inv categorieObligatoire] Une carte de fidélité '
                    . 'doit être rattachée à une catégorie existante.'
                );
            }

            // inv statutValide :
            //   Set{'Actif','Inactif'}->includes(self.status)
            if (
                $carte->status !== null
                && !in_array($carte->status, self::STATUTS_AUTORISES, true)
            ) {
                throw new \InvalidArgumentException(
                    '[OCL inv statutValide] Statut invalide : '
                    . $carte->status
                    . '. Valeurs autorisées : Actif, Inactif.'
                );
            }
        };

        static::creating($invariants);
        static::updating($invariants);

        // ── Comportement original : mise à jour du compteur catégorie ─────
        static::saved(function ($carte) {
            if ($carte->category) {
                $carte->category->increment('Cartes_cadeau');
            }
        });
    }
}