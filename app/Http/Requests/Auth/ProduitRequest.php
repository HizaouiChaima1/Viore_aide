<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'SKU' => 'required|string|max:255', 
        'Categorie' => 'required|string', 
        'Prix' =>'required|numeric', 
        'Groupe dimpot' =>'string', 
        'status'=>'string',];
}

}