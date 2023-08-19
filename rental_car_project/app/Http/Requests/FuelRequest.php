<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelRequest extends FormRequest
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
            'type' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Ce champs est obligatoire',
            'type.min' => 'Le type de carburant doit contenir au moins 3 caractères'
        ];
    }
}
