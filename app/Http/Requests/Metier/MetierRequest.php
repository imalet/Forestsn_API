<?php

namespace App\Http\Requests\Metier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MetierRequest extends FormRequest
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
            'image' => 'nullable|string',
            'nom_metier' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nom_metier.required' => 'Le champ "Nom du métier" est requis.',
            'description.required' => 'Le champ "Description" est requis.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

}
