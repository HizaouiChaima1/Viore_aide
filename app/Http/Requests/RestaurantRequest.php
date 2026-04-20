<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function rules()
    {
        return [
            
            'customerName' => 'required|string|max:255',
            'customerContact' => 'required|string|max:255',
            'nomrestau' => 'required|string|max:255',
            'customerAddress1' => 'required|string|max:255',
            'customerEmail' => 'required|string|email|max:255|unique:restaurants',
            'pays' => 'required|string|max:255',
            'status' => 'string|max:255',
        ];
    }
}