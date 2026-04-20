<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Articles';
    protected $fillable = ['Nom','SKU','Catégorie', 'espacestockage', 'uniteingrediant','methodedecalcul','prix'];
    protected $dates = ['deleted_at']; 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class);
    }
 }
   
