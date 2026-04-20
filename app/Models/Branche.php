<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branche extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'Branches';
    protected $fillable = ['Nom','référence','tax_groupe','ouverture','fermeture'];

    protected $primaryKey = 'id'; 
    public $incrementing = false; 

   
}