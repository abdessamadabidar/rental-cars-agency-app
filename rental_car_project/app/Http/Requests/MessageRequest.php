<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'subject' => 'required|min:5|max:20',
            'content' => 'required|min:5|max:500',
        ];
    }

    public function messages()
    {
        return [
            'subject' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Le titre doit contenir au moins 5 caractères',
                'max' => 'Le message ne peut contenir que 20 caractères'
            ],

            'content' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Le titre doit contenir au moins 5 caractères',
                'max' => 'Le message ne peut contenir que 500 caractères'
            ]
        ];
    }
}
