<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'nif_number' => 'nullable|string|max:15|min:15|unique:profiles, nif_number,'.$this->route('profile')->id.'|max:15',
            'phone' => 'nullable|string|min:9|unique:profiles, nif_phone,'.$this->route('profile')->id.'|max:9',
            'address' => 'nullable|string',
                        
        ];
    }

    public function messages()
    {
        return [
            // 'first_name.required' => 'Campo obrigatório',
            'first_name.string' => 'Valor incorreto',
            'first_name.max' => 'Só são permitidos 255 caracteres',
            'last_name.string' => 'Valor incorreto',
            'last_name.max' => 'Só são permitidos 255 caracteres',

            // 'nif_number.required' => 'Campo obrigatório',
            'nif_number.string' => 'Valor incorreto',
            'nif_number.max' => 'Só são permitidos 15 caracteres',
            'nif_number.min' => 'Só são permitidos 15 caracteres',
            'nif_number.unique' => 'Já registrado',

            // 'phone.required' => 'Campo obrigatório',
            'phone.string' => 'Valor incorreto',
            'phone.max' => 'Só são permitidos 15 caracteres',
            'phone.min' => 'Só são permitidos 15 caracteres',
            'phone.unique' => 'Já registrado',

            'address.string' => 'Valor incorreto',
            'address.max' => 'Só são permitidos 50 caracteres',
            
        ];    
    }
}
