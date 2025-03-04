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
            'cin' => 'required|string|size:8|unique:patients',
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
            'nom.string' => 'le nom doit etre une chaine de charactères',
            'nom.max' => 'le nom ne doit pas dépasser 255 charactères',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'le nom doit etre une chaine de charactères',
            'prenom.max' => 'le nom ne doit pas dépasser 255 charactères',
            'cin.required' => 'Le CIN est obligatoire.',
            'cin.string' => 'Le CIN doit etre une chaine.',
            'cin.size' => 'Le CIN ne doit pas dépassez 8 charactères.',
            'cin.unique' => 'Ce CIN est déjà utilisé. Veuillez entrer un CIN unique.',
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'tel.required' => 'Le numéro de téléphone est obligatoire.',
            'tel.string' => 'Le numéro de téléphone doit etre une chaine.',
            'tel.max' => 'Le numéro de téléphone ne doit pas dépassez 20 chiffres.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.in' => 'Le sexe doit être "M" (Homme) ou "F" (Femme).',
            'taille.required' => 'La taille est obligatoire.',
            'taille.numeric' => 'La taille doit être un nombre.',
            'taille.min' => 'La taille ne doit pas etre une valeur négative.',
            'poids.required' => 'Le poids est obligatoire.',
            'poids.numeric' => 'Le poids doit être un nombre.',
            'poids.min' => 'Le poids ne doit pas etre une valeur négative.',
            'groupe_sangin.required' => 'Le groupe sanguin est obligatoire.',
            'groupe_sangin.string' => 'Le groupe doit etre une chaine.',
            'groupe_sangin.max' => 'Le groupe sanguin ne doit pas dépasser 5 charactères.',
            'assure.required' => 'Veuillez indiquer si le patient est assuré ou non.',
        ];
    }
}
