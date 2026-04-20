<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionmodifRequest extends FormRequest
{
    public function rules()
{
    return [
        'Nom' => 'required|string', 
        'modificateur' => 'required|string',
        'SKU' =>'required|string',
        'prix'=>'required|numeric',
        'groupe_impot'=>'string',
        'méthode_calcul_couts'=>'required|string',
        'cout'=>'numeric',
        'calories'=>'numeric'




       
       
        
    ];
   
}

}