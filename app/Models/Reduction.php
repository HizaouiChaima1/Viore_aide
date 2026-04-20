<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reduction extends Model
{
    use HasFactory; 
    use SoftDeletes;

    protected $table = 'reductions';
    protected $fillable = ['nom','qualification','type_reduction', 'reference','montant_reductionF','montant_reductionP','reduction_maximale'];
    protected $primaryKey = 'id'; 
    public $incrementing = false; 
}