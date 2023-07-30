<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'person_id' => ['integer', 'sometimes', 'exists:persons,id'],
            'phone' => ['sometimes', 'max:20'],
            'whatsapp' => ['nullable', 'max:20'],
            'email' => ['email', 'sometimes', 'max:100'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
