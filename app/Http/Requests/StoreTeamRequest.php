<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'teams' => 'required|array',
            'teams.*' => 'required|string|max:255|unique:tournament_teams,name',
        ];
    }

    public function messages(): array
    {
        return [
            'teams.required' => 'The teams field is required.',
            'teams.array' => 'The teams field must be an array.',
            'teams.*.required' => 'The team :attribute field is required.',
            'teams.*.string' => 'Each team name must be a valid string.',
            'teams.*.max' => 'Each team name may not be greater than 255 characters.',
            'teams.*.unique' => 'The team name :attribute has already been taken.',
        ];
    }
}
