<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreServiceRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:services,name',
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
