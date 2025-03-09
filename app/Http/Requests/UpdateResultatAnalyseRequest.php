<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResultatAnalyseRequest extends FormRequest
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
            "analyse_id" => "required",
            "type_analyse_id" => "required",
            "resultat" => "required|string"
        ];
    }
    public function messages()
    {
        return [
            "analyse_id.required" => "l'analyse id est obligatoire",
            "type_analyse_id.required" => "le type analyse id est obligatoire",
            "resultat.required" => "le resultat est obligatoire",
            "resultat.string" => "le resultat doit etre une chaine"
        ];
    }
}
