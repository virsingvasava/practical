<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamWildCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'wildcards' => 'required|array',
            'wildcards.*' => 'required|string|max:255|unique:tournament_teams,name',
        ];
    }

    public function messages(): array
    {
        return [
            'wildcards.required' => 'The wildcards field is required.',
            'wildcards.array' => 'The wildcards field must be an array.',
            'wildcards.*.required' => 'Each wildcard field is required.',
            'wildcards.*.string' => 'Each wildcard name must be a valid string.',
            'wildcards.*.max' => 'Each wildcard name may not be greater than 255 characters.',
            'wildcards.*.unique' => 'The wildcard name :attribute has already been taken.',
        ];
    }
}
