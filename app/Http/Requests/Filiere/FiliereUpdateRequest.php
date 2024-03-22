<?php

namespace App\Http\Requests\Filiere;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FiliereUpdateRequest extends FormRequest
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
            'nom_filiere' => 'required|string',
            'description_filiere' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nom_filiere.required' => 'Le champ nom de la filière est requis.',
            'description_filiere.required' => 'Le champ description de la filière est requis.',
            'nom_filiere.string' => 'Le champ nom de la filière doit être une chaîne de caractères.',
            'description_filiere.string' => 'Le champ description de la filière doit être une chaîne de caractères.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
