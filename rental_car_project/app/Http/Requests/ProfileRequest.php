<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'cin' => 'required|between:6,8',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg,svg|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'first_name' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Prénom doit contenir au moins 3 caractères'
            ],

            'last_name' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Nom doit contenir au moins 3 caractères'
            ],

            'cin' => [
                'required' => 'Ce champs est obligatoire',
                'between' => 'CIN doit contenir au moins 6 caractères'
            ],

            'email' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'phone' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'address' => [
                'required' => 'Ce champs est obligatoire',
            ]
        ];
    }
}
