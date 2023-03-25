<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'except' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:products',
            'img_url' => 'required|image|mimes:jpeg,png,jpg',
                    
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Campo obrigatório',
            'title.string' => 'Valor incorreto',
            'title.max' => 'Só são permitidos 255 caracteres',

            'description.required' => 'Campo obrigatório',
            'description.string' => 'Valor incorreto',

            'except.required' => 'Campo obrigatório',
            'except.string' => 'Valor incorreto',

            'img_url.required' => 'Campo obrigatório',
            'img_url.image' => 'Deve inserir uma imagem',
            'img_url.mimes' => 'Deve inserir uma imagem no formato jpeg, jpg ou png',

        ];    
    }
}
