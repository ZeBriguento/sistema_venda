<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:sub_categories,name,'.$this->route('subCategory')->id.'|max:100',
            'description' => 'nullable|string|max:255',            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Já cadastrado',
            'name.string' => 'Valor incorreto',
            'name.max' => 'Só são permitidos 100 caracteres',
            
            'description.string' => 'Valor incorreto',   
            'description.max' => 'Só são permitidos 255 caracteres',         
        ];    
    }
}
