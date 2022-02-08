<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPutRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [

            'name' => 'string',
            'email' => 'string',
            'phone' => 'float',
            'adress' => 'string|max:255',
            'city' => 'string',
            'notes' => 'string|max:255',
            'created_at' => 'date',
            'updated_at' => 'date',
            'deleted_at' => 'date',
        ];
    }
}
{

}
