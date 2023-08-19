<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8'
        ];
    }


    public function messages()
    {
        return [

            'current_password' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'new_password' => [
                'required' => 'Ce champs est obligatoire',
                'confirmed' => 'Les mots de passe que vous avez entrés ne sont pas identiques',
                'min' => 'Le mot de passe doit contenir au moins 8 caractères'
            ],
        ];
    }
}
