<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'customerName',
        'nomrestau',
        'pays',
        'customerAddress1',
        'customerContact',
        'customerEmail',
        'status',
    ];

    /**
     * Valeurs de statut gérées par VerbalStatusStrategy.
     * Correspond à la contrainte OCL :
     *   inv statutValide:
     *     Set{'activer','inactiver'}->includes(self.status)
     */
    private const STATUTS_AUTORISES = ['activer', 'inactiver'];

    protected static function boot()
    {
        parent::boot();

        // ── Comportement original : génération ID aléatoire ───────────────
        static::creating(function ($model) {
            $model->id = Str::random(7);
        });

        // ══════════════════════════════════════════════════════════════════
        // OCL — Invariants vérifiés avant toute création ET modification
        // ══════════════════════════════════════════════════════════════════
        $invariants = function ($model) {

            // pre activationComplete :
            //   self.nomrestau <> null
            //   and self.customerEmail <> null
            //   and self.customerContact <> null
            if (
                empty($model->nomrestau)
                || empty($model->customerEmail)
                || empty($model->customerContact)
            ) {
                throw new \InvalidArgumentException(
                    '[OCL pre activationComplete] nomrestau, customerEmail '
                    . 'et customerContact sont obligatoires.'
                );
            }

            // inv statutValide :
            //   Set{'activer','inactiver'}->includes(self.status)
            if (
                $model->status !== null
                && !in_array($model->status, self::STATUTS_AUTORISES, true)
            ) {
                throw new \InvalidArgumentException(
                    '[OCL inv statutValide] Statut invalide : '
                    . $model->status
                    . '. Valeurs autorisées : '
                    . implode(', ', self::STATUTS_AUTORISES)
                );
            }

            // inv emailUnique :
            //   Restaurant.allInstances()
            //     ->select(r | r <> self)
            //     ->forAll(r | r.customerEmail <> self.customerEmail)
            $doublon = self::where('customerEmail', $model->customerEmail)
                ->where('id', '!=', $model->id)
                ->exists();

            if ($doublon) {
                throw new \InvalidArgumentException(
                    '[OCL inv emailUnique] Cet email est déjà associé '
                    . 'à un restaurant existant.'
                );
            }
        };

        static::creating($invariants);
        static::updating($invariants);
    }
}