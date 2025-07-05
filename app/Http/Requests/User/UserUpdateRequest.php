<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        // dd('RULES CALLED');
        $userId = request()->user;
        $currentEmail = User::where('id', $userId)->pluck('email')->first();
        // dd('RULE');
        return [
            'f_name' => ['required', 'string', 'max:100'],
            'l_name' => ['required', 'string', 'max:100'],
            // 'username' => ['required', 'string', 'max:200', Rule::unique('users', 'username')->ignore($userId)],
            'email' => ['required', 'email', 'max:200', function ($attribute, $value, $fail) use ($currentEmail) {
                if ($value !== $currentEmail) {
                    $fail('You cannot change your email. Please contact the admin!');
                }
            }],
            'about' => ['required', 'string', 'max:250'],
            'file' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }
}
