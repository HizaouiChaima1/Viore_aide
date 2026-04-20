<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fournisseur extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'fournisseurs';
    protected $fillable = ['Nom','Code','Nom_contact','numero_de_téléphone','Email_principale','Email_secondaire' ];
    protected $dates = ['deleted_at']; 
 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    

}