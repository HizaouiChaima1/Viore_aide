<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrancheRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'référence' => 'required|string|max:255', 
        'tax_groupe'=>'string',
        'ouverture' => 'date_format:H:i',
        'fermeture' => 'date_format:H:i',
        

    ];
   
}

}