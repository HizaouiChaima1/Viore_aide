<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employe extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    use \Illuminate\Notifications\Notifiable;
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'employes';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'Nom',
        'Email',
        'numero_de_téléphone',
        'Rôle',
        'password',
        'nomrestau',
        'customerAddress1',
        'pays',
    ];

    /**
     * Rôles reconnus par le système d'authentification.
     * Correspond à la contrainte OCL :
     *   inv roleValide:
     *     Set{'admin','Caissier','Cuisinier','Serveur'}
     *       ->includes(self.Role)
     */
    private const ROLES_AUTORISES = [
        'admin',
        'Caissier',
        'Cassier',
        'Cuisinier',
        'Serveur',
        'client',
    ];

    public static function boot()
    {
        parent::boot();

        // ── Comportement original : rattachement restaurant ───────────────
        static::creating(function ($employee) {
            $user = Auth::guard('employee')->user();
            if (!$employee->nomrestau && $user && $user->Rôle === 'admin') {
                $employee->nomrestau = $user->nomrestau;
            }
        });

        // ══════════════════════════════════════════════════════════════════
        // OCL — Invariants vérifiés avant toute création ET modification
        // ══════════════════════════════════════════════════════════════════
        $invariants = function ($employee) {

            // inv nomNonVide : self.Nom <> null and self.Nom.size() > 0
            if (empty(trim((string) $employee->Nom))) {
                throw new \InvalidArgumentException(
                    '[OCL inv nomNonVide] Le nom de l\'employé ne peut pas être vide.'
                );
            }

            // inv roleValide :
            //   Set{'admin','Caissier','Cuisinier','Serveur'}
            //     ->includes(self.Role)
            if (
                $employee->{'Rôle'} !== null
                && !in_array($employee->{'Rôle'}, self::ROLES_AUTORISES, true)
            ) {
                throw new \InvalidArgumentException(
                    '[OCL inv roleValide] Rôle invalide : '
                    . $employee->{'Rôle'}
                    . '. Valeurs autorisées : '
                    . implode(', ', self::ROLES_AUTORISES)
                );
            }

            // inv emailUniqueParRestaurant :
            //   Employe.allInstances()
            //     ->select(e | e.nomrestau = self.nomrestau and e <> self)
            //     ->forAll(e | e.Email <> self.Email)
            $doublon = self::where('nomrestau', $employee->nomrestau)
                ->where('Email', $employee->Email)
                ->where('id', '!=', $employee->id)
                ->exists();

            if ($doublon) {
                throw new \InvalidArgumentException(
                    '[OCL inv emailUniqueParRestaurant] Cet email est déjà utilisé '
                    . 'par un autre employé du même restaurant.'
                );
            }
        };

        static::creating($invariants);
        static::updating($invariants);
    }

    /**
     * GRASP : Expert en Information
     * Le modèle détient la règle de visibilité — pas le contrôleur.
     *
     * inv roleValide implicitement respecté ici :
     *   seuls les rôles 'admin' et non-admin sont distingués.
     */
    public function scopeVisibleTo($query, $user)
    {
        if (!$user) {
            return $query->whereRaw('1 = 0');
        }

        return $query->where('nomrestau', $user->nomrestau)
            ->where(function ($q) use ($user) {
                $q->where('Rôle', '!=', 'admin')
                    ->orWhere('employes.id', $user->id);
            });
    }
}