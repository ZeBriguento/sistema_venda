<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products,name,'.$this->route('product')->id.'|max:255',
            'description' => 'required|string',
            'sell_price' => 'required|numeric|between:0,99999999999.99',
            // 'slug' => 'nullable|string|max:255|unique:products',
            'min_qty' => 'required|integer',
            'stock' => 'required|integer',
            'size' => 'required|string',
            'color' => 'required|string',
            'material' => 'required|string',
            // 'image_url' => 'required|string|image',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg',
            // 'image_url.*' => 'required|image',
            'image_url.*'=> ['nullable','required', 'image', 'mimes:jpeg,png,jpg'],
            // 'image_url.*' => 'image',
            // 'image_url.*' =>[],
                    
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.string' => 'Valor incorreto',
            'name.max' => 'Só são permitidos 255 caracteres',
            'name.unique' => 'Já cadastrado',

            'description.required' => 'Campo obrigatório',
            'description.string' => 'Valor incorreto',

            'sell_price.required' =>  'Campo obrigatório',
            'sell_price.numeric' => 'Valor incorreto',
            'sell_price.between' => 'Valor deve estar entre 0 a 99999999999.99',

            'min_qty.integer' => 'Valor incorreto',
            'min_qty.required' =>  'Campo obrigatório',

            'stock.integer' => 'Valor incorreto',
            'stock.required' =>  'Campo obrigatório',

            'size.string' => 'Valor incorreto',
            'size.required' =>  'Campo obrigatório',

            'main_image.required' => 'Campo obrigatório',
            'main_image.image' => 'Deve inserir uma imagem',
            'main_image.mimes' => 'Deve inserir uma imagem no formato jpeg, jpg ou png',

            'image_url.required' => 'Campo obrigatório',
            'image_url.image' => 'Deve inserir uma imagem',
            'image_url.mimes' => 'Deve inserir uma imagem no formato jpeg, jpg ou png',
            'image_url.mimes' => 'Deve inserir uma imagem no formato jpg ou png',


            
            

            'material.string' => 'Valor incorreto',
            'material.required' =>  'Campo obrigatório',

            'color.string' => 'Valor incorreto',
            'color.required' =>  'Campo obrigatório',

            // 'image_url' => 'required|string',
            // 'main_image' => 'required|string',

        ];    
    }
}
