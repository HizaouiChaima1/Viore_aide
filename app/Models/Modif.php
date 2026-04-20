<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\SoftDeletes;

class Modif extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'modif';
    protected $fillable = ['Nom','référence','option','Produits_liés' ];
    protected $dates = ['deleted_at']; 
 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    public function optionmodif()
    {
        return $this->belongsTo(Optionmodif::class, 'option');
    }

    

}