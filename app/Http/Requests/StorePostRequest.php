<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;



class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Message to handle error exception
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json(
                ['success' => false, 
                'message' => $validator->errors()
            ], 412)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author_id' => 'required|uuid',
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn',
            'publication_year' => 'required|integer',
            'genre' => 'required|string',
            'available_copies' => 'required|integer',
        ];
    }
}
