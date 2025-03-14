<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserControllerRequest extends FormRequest
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
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6|confirmed'
        ];
    }
    public function messages(): array
    {
        return [
            'nom.required' => 'le nom est obligatoire',
            'nom.max' => 'le nom ne doit pas passer 255 charactères',
            'prenom.required' => 'le prènom est obligatoire',
            'prenom.max' => 'le prènom ne doit pas passer 255 charactères',
            'email.required' => 'email est obligatoire',
            'email.email' => 'email est invalide',
            'email.unique' => 'cette email est déja utilisé',
            'role.required' => 'le role est obligatoire',
            'password.required' => 'mot de passe est obligatoire',
            'password.min' => 'mot de passe doit dépasser six caractères',
            'password.confirmed' => 'les mots de passe ne sont pas identiques'
        ];
    }
}
