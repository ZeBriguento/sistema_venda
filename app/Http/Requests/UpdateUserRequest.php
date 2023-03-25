<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            
            'email' => 'required|string|email|unique:users,email,'.$this->route('user')->id.'|max:255',
            'password' => 'nullable|string|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.string' => 'Valor incorreto',
            'name.max' => 'Só são permitidos 255 caracteres',

            'email.required' => 'Campo obrigatório',
            'email.string' => 'Valor incorreto',
            'email.max' => 'Só são permitidos 255 caracteres',
            'email.unique' => 'Já registrado',
            'email.email' => 'Email inválido',

            'password.string' => 'Valor incorreto',
            'password.max' => 'Só são permitidos 255 caracteres',
            
        ];    
    }
}
