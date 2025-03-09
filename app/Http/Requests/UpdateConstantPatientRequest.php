<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateconstantpatientrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'constant_id' => 'required|exists:constants,id',
            'date' => 'required|date',
            'valeur' => 'required|string|max:255',
        ];
    }

    public function messages(): array{
        return [
            'patient_id.required' => 'Le patient est obligatoire.',
            'constant.required' => 'Le constant est obligatoire.',
            'date.required' => 'La date est obligatoire.',
            'valeur.required' => 'La valeur est obligatoire.',
            'valeur.max' => 'le maximum est 255',
        ];

    }
}
