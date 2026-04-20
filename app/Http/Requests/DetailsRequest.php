<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'Nom' => 'required|string|max:255',
            'photo'=> 'image',
            'Email' => 'required|email|unique:admin,email',
            'nomrestau' => 'required|string|max:255',
            'numero_de_téléphone' => 'required|string|max:255',
            'customerAddress1' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
        ];
    }
}