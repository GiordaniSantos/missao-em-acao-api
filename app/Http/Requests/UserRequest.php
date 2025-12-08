<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
            'password' => ['string', 'nullable', 'min:8', 'confirmed'],
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.max' => 'O campo nome não pode ultrapassar 255 caracteres.',
            'email.max' => 'O campo email não pode ultrapassar 255 caracteres.',
            'email.email' => 'O campo email deve ser do tipo Email.',
            'password.min' => 'O campo senha deve ter no minimo 8 caracteres.',
            'password.confirmed' => 'O campo senha não corresponde ao campo de confirmação de senha.',
        ];
    }
}
