<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'current_password' => 'required|string',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                Rule::notIn([request()->current_password]),
            ],
            'password_confirmation' => 'required|string|min:6',
        ];
    }
}
