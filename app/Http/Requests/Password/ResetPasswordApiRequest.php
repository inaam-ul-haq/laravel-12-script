<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class ResetPasswordApiRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'string', 'min:8']
        ];
    }

    /**
     * @param Validator $Validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $Validator)
    {
        $Response = new Response(["message" => "The given data was invalid.", "errors" => $Validator->errors()], Response::HTTP_BAD_REQUEST);
        throw new ValidationException($Validator, $Response);
    }
}
