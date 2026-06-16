<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "sometimes|required|string|max:255",
            "email" => "sometimes|required|email|unique:teachers,email,",
            "phone" => "nullable|string|max:20",
            "specialization" => "nullable|string|max:255",
            'classroom_id' => 'sometimes|exists:classrooms,id',
        ];
    }
}
