<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'référence' =>'required|string', 
       
       
        
    ];
   
}

}