<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employe extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'employes';
    protected $fillable = ['Nom','Email','numero_de_téléphone','Rôle','password','nomrestau','customerAddress1','pays' ];

 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    /**
     * GRASP: Information Expert
     * Le modèle centralise la règle métier définissant quels employés
     * sont visibles pour un utilisateur connecté.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibleTo($query, $user)
    {
        // Sécurité : Si l'utilisateur n'est pas connecté, on ne renvoie rien.
        if (!$user) {
            return $query->whereRaw('1 = 0');
        }

        // On filtre par restaurant (en s'assurant que la valeur n'est pas vide)
        $restaurant = $user->nomrestau;
        
        return $query->where(function($q) use ($restaurant, $user) {
            // Règle 1 : Même restaurant
            if (!empty($restaurant)) {
                $q->where('nomrestau', $restaurant);
            }
            
            // Règle 2 : Ne voir que les non-admins OU soi-même
            $q->where(function($sub) use ($user) {
                $sub->where('Rôle', '!=', 'admin')
                    ->orWhere('employes.id', $user->id);
            });
        });
    }
    

    public static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            // Utilisation du garde 'employee' pour récupérer le restaurant de l'admin connecté
            $user = Auth::guard('employee')->user();
            if (!$employee->nomrestau && $user && $user->Rôle === 'admin') {
                $employee->nomrestau = $user->nomrestau;
            }
        });
    }

}