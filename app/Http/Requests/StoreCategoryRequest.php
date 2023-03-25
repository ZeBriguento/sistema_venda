<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',             
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Categoria já registrada',
            'name.string' => 'Valor incorreto',
            'name.max' => 'Só são permitidos 255 caracteres',

            'description.string' => 'Valor incorreto',  
            'description.max' => 'Só são permitidos 255 caracteres',          
        ];    
    }
}
