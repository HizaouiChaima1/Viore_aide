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
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            if (!$employee->nomrestau && Auth::user() && Auth::user()->Rôle === 'admin') {
                $employee->nomrestau = Auth::user()->nomrestau;
            }
        });
    }

}