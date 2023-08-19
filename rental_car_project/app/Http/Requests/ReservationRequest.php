<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'permis_recto' => 'required',
            'permis_verso' => 'required',
            'date_debut' => 'required',
            'heure_debut' => 'required',
            'date_fin' => 'required',
            'heure_fin' => 'required',
            'car_id' => 'required',
            'client_id' => 'required',
        ];
    }


}
