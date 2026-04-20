<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandsRequest extends FormRequest
{
    public function rules()
{
    return [
        'branch'=> 'required|string',
        'type_commande' => 'required|string', // Type de commande doit être une chaîne et est requis
        'client' => 'required|string|max:255', // Le nom du client doit être une chaîne et ne doit pas dépasser 255 caractères
        'heure_arrivee' => 'required|date', // L'heure d'arrivée doit être une date et est requise
        'notes_ticket' => 'nullable|string', // Les notes du ticket peuvent être une chaîne, mais peuvent être nulles
        'notes_cuisine' => 'nullable|string', // Les notes pour la cuisine peuvent être une chaîne, mais peuvent être nulles
        'total_price' => 'required|numeric', 
    ];
}

}