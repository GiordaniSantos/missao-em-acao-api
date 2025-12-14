<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembresiaRequest extends FormRequest
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
            'id_usuario' => 'exists:users,id',
            'quantidade' => 'required',
            'nome' => 'required|max:20',
            'created_at' => ['date'],
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
            'required' => 'O campo :attribute deve ser preenchido',
            'id_usuario.exists' => 'O usuário informado não existe!',
            'nome.max' => 'O campo :attribute não pode ultrapassar 20 caracteres.',
        ];
    }
}
