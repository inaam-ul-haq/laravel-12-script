<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class AuthSidebarMenuRequest extends FormRequest
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
            'menu_id' => 'required|exists:auth_sidebar_menus,id',
            'status' => 'required|boolean',
        ];
    }

    /**
     * @param Validator $Validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $Validator)
    {
        $Response = new Response(["message" => __('language.invalid_data'), "errors" => $Validator->errors()], Response::HTTP_BAD_REQUEST);
        throw new ValidationException($Validator, $Response);
    }
}
