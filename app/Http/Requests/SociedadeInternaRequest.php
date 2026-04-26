<?php

namespace App\Http\Requests;

use App\Enums\SociedadesInternas;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SociedadeInternaRequest extends FormRequest
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
            'nome' => ['required', Rule::enum(SociedadesInternas::class)],
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
            'nome.required' => 'A sociedade interna é obrigatória!',
            'nome.Illuminate\Validation\Rules\Enum' => 'A sociedade interna informada não é válida.',
        ];
    }
}
