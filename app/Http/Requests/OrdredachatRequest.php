<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdredachatRequest extends FormRequest
{
    public function rules()
{
    return [
        'fournisseur' => 'required|string', 
        'destination' => 'required|string|max:255', 
        'date_livraison' => 'date', 
        'note' =>'nullable|string', 
        
    ];
   
}

}