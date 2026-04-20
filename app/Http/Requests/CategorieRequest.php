<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'Nom' => 'required|string', 
            'photo'=> 'image',
            'Categoriep' => 'required|string',
            'Référence' => 'required|string|max:255', 
            'Produit' => 'nullable|numeric', 
            'Combinaisons' =>'nullable|numeric', 
            'Cartes_cadeau' =>'nullable|numeric',
        ];
    }
}
