<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ordredachat extends Model
{
    use HasFactory;

    protected $table = 'Ordredachat';
    protected $fillable = ['fournisseur','destination','date_livraison', 'note',];

    protected $primaryKey = 'id'; 
    public $incrementing = false; 

   
}