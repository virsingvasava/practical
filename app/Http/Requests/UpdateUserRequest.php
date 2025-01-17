<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users')->ignore($this->id), 
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->id), 
            ],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => [
                'nullable',
                'numeric', 
                'digits_between:10,15', 
                Rule::unique('users')->ignore($this->id), 
            ],
            'status' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'username' => 'username',
            'email' => 'email address',
            'profile_picture' => 'profile picture',
            'phone_number' => 'phone number',
            'password' => 'password',
            'password_confirmation' => 'confirm password',
            'status' => 'status',
            'slug' => 'slug',
        ];
    }
}
