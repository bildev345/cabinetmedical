<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:patients,cin,' . $this->patient->id,  // Ajouter l'ID patient pour éviter les conflits
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:100',
            'tel' => 'required|string|max:20',
            'sexe' => 'required|in:M,F', 
            'taille' => 'required|numeric|min:0',
            'poids' => 'required|numeric|min:0',
            'groupe_sangin' => 'required|string|max:5',
            'assure' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'cin.required' => 'Le CIN est obligatoire.',
            'cin.unique' => 'Ce CIN est déjà utilisé.',
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'tel.required' => 'Le numéro de téléphone est obligatoire.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.in' => 'Le sexe doit être "M" (Homme) ou "F" (Femme).',
            'taille.required' => 'La taille est obligatoire.',
            'taille.numeric' => 'La taille doit être un nombre.',
            'poids.required' => 'Le poids est obligatoire.',
            'poids.numeric' => 'Le poids doit être un nombre.',
            'groupe_sangin.required' => 'Le groupe sanguin est obligatoire.',
            'assure.required' => 'Veuillez indiquer si le patient est assuré ou non.',
        ];
    }
}
