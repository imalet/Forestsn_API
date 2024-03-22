<?php

namespace App\Http\Requests\Accreditation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAccreditationRequest extends FormRequest
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
            'type_accreditation' => 'required|string',
            'description_accreditation' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'type_accreditation.required' => 'Le type d\'accréditation est requis.',
            'description_accreditation.required' => 'La description de l\'accréditation est requise.',
            'type_accreditation.string' => 'Le type d\'accréditation doit être une chaîne de caractères.',
            'description_accreditation.string' => 'La description de l\'accréditation doit être une chaîne de caractères.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
