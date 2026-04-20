<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReductionRequest extends FormRequest
{
    public function rules()
{
    return [
        'nom' => 'required|string', 
        'qualification' => 'required|string', 
        'type_reduction'=>'required|string',
        'reference' => 'string', 
         'montant_reductionF'=>'nullable|numeric',
         'montant_reductionP'=>'nullable|numeric',
      'reduction_maximale'=>'nullable|numeric',
    ];
    
}

}