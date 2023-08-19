<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'brand' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Nom de Modèle doit contenir au moins 2 caractères'
            ],

            'brand' => [
                'required' => 'Ce champs est obligatoire',
            ],
        ];
    }
}
