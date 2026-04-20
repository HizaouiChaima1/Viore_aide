<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class born extends Model
{
    use HasFactory;
    protected $table = 'born';
    protected $fillable = [
        'user_id',
        'products',
        'total',
    ];

    protected $casts = [
        'products' => 'array', // Convertit la colonne JSON en tableau associatif
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
