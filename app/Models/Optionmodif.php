<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Modif;
use Illuminate\Database\Eloquent\SoftDeletes;

class Optionmodif extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'optionmodif';
    protected $fillable = ['Nom','SKU','modificateur_id','prix','groupe_impot', 'méthode_calcul_couts','cout','calories' ];
    protected $dates = ['deleted_at']; 
 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    public function modify()
    {
        return $this->belongsTo(Modif::class, 'modificateur_id');
    }

    protected static function booted()
    {
        static::creating(function ($optionmodif) {
            $modificateur = Modif::find($optionmodif->modificateur_id);
            if ($modificateur) {
                $modificateur->increment('option');
            }
        });
    
    }
}
