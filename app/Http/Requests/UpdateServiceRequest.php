<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\DB;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        $serviceId = $this->route('id');

        return [
            'name' => 'required|string|max:255|unique:services,name,' . $serviceId,
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255',
        ];
    }
    protected function prepareForValidation()
    {
        $slug = $this->input('slug') ?: \Str::slug($this->input('name'));
        $originalSlug = $slug;
        $counter = 1;

        while (\DB::table('services')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $this->merge(['slug' => $slug]);
    }
}
