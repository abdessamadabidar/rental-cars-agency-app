<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'email' => 'required',
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ];
    }

    public function messages()
    {
        return [
            'email' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'title' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Le titre doit contenir au moins 10 caractères'
            ],

            'content' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Le message doit contenir au moins 20 caractères'
            ],
        ];
    }
}
