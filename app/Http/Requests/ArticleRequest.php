<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'SKU' => 'required|string|max:255', 
        'Catégorie' => 'required|string', 
        'espacestockage' =>'nullable|string', 
        'uniteingrediant'=> 'nullable|string',
        'methodedecalcul'=>'nullable|string',
        'prix'=>'nullable|numeric',
    ];
   
}

}