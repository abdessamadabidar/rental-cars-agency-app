<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'modele' => 'required',
            'matricule' => 'required',
            'puissance' => 'required|min:1',
            'kilometrage' => 'required',
            'couleur' => 'required',
            'nbr_de_places' => 'required',
            'prix' => 'required|min:1',
            'boite_vitesse' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'modele' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'matricule' => [
                'required' => 'Ce champs est obligatoire',
//                'regex' => 'invalid matricule',
            ],

            'puissance' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Puissance ne peut etre zero',
            ],

            'kilometrage' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'couleur'  => [
                'required' => 'Ce champs est obligatoire',
            ],

            'nbr_de_places' => [
                'required' => 'Ce champs est obligatoire',
            ],

            'prix' => [
                'required' => 'Ce champs est obligatoire',
                'min' => 'Prix doit etre plus de 0dh',
            ],

            'boite_vitesse' => [
                'required' => 'Ce champs est obligatoire',
            ]

        ];
    }
}
