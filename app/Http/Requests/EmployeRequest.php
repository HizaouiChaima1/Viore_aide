<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'string', 
        'Email' =>'required|string', 
        'numero_de_téléphone' =>'numeric', 
        'Rôle'=>'string',
        'password'=>'string',
        'nomrestau' => 'string|max:255',
        'customerAddress1' => 'string|max:255',
        'pays' => 'string|max:255',
       'photo'=>'image',
    ];
   

    
}

}