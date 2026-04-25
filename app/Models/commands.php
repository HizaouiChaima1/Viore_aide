<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class commands extends Model
{
    use HasFactory;

    protected $table = 'commands'; // Nom de la table dans la base de données
    protected $fillable = [
        'branch',
        'type_commande',
        'client',
        'status',
        'heure_arrivee',
        'notes_ticket',
        'notes_cuisine',
        'total_price',
        'produits',
    ]; // Les champs que vous souhaitez pouvoir remplir via Mass Assignment

    /**
     * GRASP: Information Expert
     * 
     * Le modèle est l'expert de ses propres données.
     * Le cast 'array' gère automatiquement la conversion JSON ↔ array,
     * éliminant le besoin de json_decode() dans les contrôleurs.
     */
    protected $casts = [
        'produits' => 'array',
        'heure_arrivee' => 'datetime',
    ];

    protected $primaryKey = 'id'; // Clé primaire
    public $incrementing = false; // Désactiver l'incrémentation automatique pour les identifiants aléatoires

    // Logique pour générer un ID aléatoire avant la sauvegarde
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::random(7); // Générer un ID aléatoire avant la sauvegarde
        });
    }
    public function produitsList()
    {
        return $this->belongsToMany(Produit::class);
    }
}
