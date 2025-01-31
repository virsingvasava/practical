<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $teamId = $this->route('id');
        return [
            'name' => 'required|string|max:255|unique:tournament_teams,name,' . $teamId,
        ];
    }
}
