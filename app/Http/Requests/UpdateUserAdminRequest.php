<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAdminRequest extends FormRequest
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
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,'.$this->route('user')->id.'|max:255',
            'password' => 'nullable|string|max:255',
            // Admin
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            // 'email' => 'nullable|string|email|max:255|unique:users',
            // 'nif_number' => 'required|string|min:15|unique:admins,nif_number,'.$this->route('user')->id.'|max:15',
            // 'phone' => 'required|string|min:9|unique:admins,phone,'.$this->route('user')->id.'|max:9',
            'nif_number' => 'required|string|min:15|max:15',
            'phone' => 'required|string|min:9||max:9',
            'address' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Campo obrigatório',
            // 'name.string' => 'Valor incorreto',
            // 'name.max' => 'Só são permitidos 255 caracteres',

            'password.required' => 'Campo obrigatório',
            'password.string' => 'Valor incorreto',
            'password.max' => 'Só são permitidos 255 caracteres',

            'email.required' => 'Campo obrigatório',
            'email.string' => 'Valor incorreto',
            'email.max' => 'Só são permitidos 255 caracteres',
            'email.unique' => 'Já registrado',
            'email.email' => 'Email inválido',

            'password.string' => 'Valor incorreto',
            'password.max' => 'Só são permitidos 255 caracteres',
            // 'password.required' => 'Campo obrigatório',

            // Admins
            'first_name.string' => 'Valor incorreto',
            'first_name.max' => 'Só são permitidos 50 caracteres',
            'first_name.required' => 'Campo obrigatório',
            'last_name.required' => 'Campo obrigatório',
            'last_name.string' => 'Valor incorreto',
            'last_name.max' => 'Só são permitidos 50 caracteres',

            // 'nif_number.required' => 'Campo obrigatório',
            'nif_number.required' => 'Campo obrigatório',
            'nif_number.string' => 'Valor incorreto',
            'nif_number.max' => 'Só são permitidos 15 caracteres',
            'nif_number.min' => 'Só são permitidos 15 caracteres',
            // 'nif_number.unique' => 'Já registrado',

            // 'phone.required' => 'Campo obrigatório',
            'phone.required' => 'Campo obrigatório',
            'phone.string' => 'Valor incorreto',
            'phone.max' => 'Só são permitidos 9 caracteres',
            'phone.min' => 'Só são permitidos 9 caracteres',
            // 'phone.unique' => 'Já registrado',

            'address.string' => 'Valor incorreto',
            'address.max' => 'Só são permitidos 255 caracteres',
            
        ];    
    }
}
