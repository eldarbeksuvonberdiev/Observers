<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => 'required',
            'birth_day' => 'required|date',
            'age' => 'required|integer',
            'field' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'birth_day.required' => 'Birthday is required.',
            'birth_day.date' => 'Birthday must be a type of date.',
            'age.required' => 'Age is required.',
            'age.integer' => 'Age must be a type of integer.',
            'field.required' => 'Field is required.',
        ];
    }
}
