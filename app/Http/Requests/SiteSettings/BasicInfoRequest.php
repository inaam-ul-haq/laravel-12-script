<?php

namespace App\Http\Requests\SiteSettings;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name' => ['required', 'max:200', 'string'],
            'site_url' => ['required', 'url', 'max:200', 'string'],
            'site_email' => ['required', 'max:200', 'string'],
            'file' => ['nullable', 'image', 'mimes:jpeg,jpg,png,svg', 'max:2048'],
        ];
    }
}
