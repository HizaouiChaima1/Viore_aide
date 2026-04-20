<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'Code' => 'string|max:255', 
        'Nom_contact' =>'string', 
        'numero_de_téléphone' =>'numeric', 
        'Email_principale'=>'string',
        'Email_secondaire '=>'string',
       
      
    ];
   

    
}

}