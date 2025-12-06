<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => __('validation.required', ['attribute' => __('validation.first_name')]),
            'last_name.required' => __('validation.required', ['attribute' => __('validation.last_name')]),
            'email.required' => __('validation.required', ['attribute' => __('validation.email')]),
            'email.email' => __('validation.email', ['attribute' => __('validation.email')]),
            'email.unique' => __('auth.email_already_taken'),
            'password.required' => __('validation.required', ['attribute' => __('auth.password')]),
            'password.min' => __('auth.password_min'),
            'password.confirmed' => __('auth.password_confirmation'),
        ];
    }
}
