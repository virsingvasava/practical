<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255', 
            'email' => 'required|email|unique:users,email|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'required|string|unique:users,phone_number|max:15',
            'status' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
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
            'status' => 'status',
            'slug' => 'slug',
            'password' => 'password',
            'password_confirmation' => 'confirm password',
        ];
    }
}
