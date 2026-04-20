<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CombosRequest extends FormRequest
{
    public function rules()
{

    $combosId = $this->route('combos');
    return [
        'nom' => 'required|string', 
        'photo' => 'image|mimes:jpeg,png,gif|max:2048',
        'sku' => 'required|string|unique:combos,sku,' . $combosId, 
        'categorie' => 'required|string', 
        'code_barre' => 'string', 
        'description' => 'string', 

    ];
}

}