<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChirurgieRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'date' => 'required|date',
             'libelle_chirurgie' => 'required|string|max:225',
             'observation' => 'nullable|string|max:1000',
             'consultation_id' => 'required|exists:consultations,id',
        ];
    }


    public function messages()
    {
        return [
             'date.required' => 'La date est obligatoire.',
             'libelle_chirurgie.required' => 'Le libellé est obligatoire.',
             'consultation_id.required' => 'La consultation est obligatoire.',
             'consultation_id.exists' => 'La consultation sélectionnée n\'existe pas.',



             'date.date' => "Le type doit etre date .",
             'libelle_chirurgie.max' => "Le max c'est 225.",

        ];
    }
}
