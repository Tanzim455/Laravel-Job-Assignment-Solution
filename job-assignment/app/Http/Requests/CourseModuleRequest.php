<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseModuleRequest extends FormRequest
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
            'addMoreInputFields.*.title' => 'required'
        ];
    }
    
    public function messages(): array
    {
        return [
            'addMoreInputFields.*.title.required' => 'The title field is required for all input fields.'
        ];
    }
    
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status' => 400,
            'errors' => $validator->messages()
        ]);
    
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
    
}
