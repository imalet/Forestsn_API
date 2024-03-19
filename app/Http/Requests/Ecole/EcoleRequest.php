<?php

namespace App\Http\Requests\Ecole;

use Illuminate\Foundation\Http\FormRequest;

class EcoleRequest extends FormRequest
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
            'imageFont' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'nom_ecole' => 'required|string',
            'abreviation_nom' => 'required|string',
            'description' => 'required|string',
            'frais_scolaire' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'imageFont.required' => 'L\'image de la police est requise.',
            'imageFont.file' => 'L\'image de la police doit être un fichier.',
            'imageFont.mimes' => 'L\'image de la police doit être au format jpeg, png ou jpg.',
            'imageFont.max' => 'L\'image de la police ne doit pas dépasser 2 Mo.',
            'logo.required' => 'Le logo est requis.',
            'logo.file' => 'Le logo doit être un fichier.',
            'logo.mimes' => 'Le logo doit être au format jpeg, png ou jpg.',
            'logo.max' => 'Le logo ne doit pas dépasser 2 Mo.',
            'nom_ecole.required' => 'Le nom de l\'école est requis.',
            'nom_ecole.string' => 'Le nom de l\'école doit être une chaîne de caractères.',
            'abreviation_nom.required' => 'L\'abréviation du nom est requise.',
            'abreviation_nom.string' => 'L\'abréviation du nom doit être une chaîne de caractères.',
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'frais_scolaire.required' => 'Les frais scolaire est requis.',
            'frais_scolaire.numeric' => 'Les frais scolaire doit être un nombre.',
        ];
    }
}
