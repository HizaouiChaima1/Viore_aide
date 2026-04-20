<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'photo' => 'image|mimes:jpeg,png,gif|max:2048',
        'Categorie' => 'required|string', 
        'Produit_en_stock'=>'string',
        'SKU' => 'required|string|max:255', 
        'Prix' =>'required|numeric', 
        'Groupe_impot' => 'nullable|string',
        'Méthode_vente' => 'nullable|string',
        'code_à_barre' => 'nullable|numeric',
        'temp_preperation' => 'nullable|string',
        'calories' => 'nullable|string',
        'description' => 'nullable|string',
    ];
    
}

}