<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        //registro de exceção para que o formulário de edição funcione
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:1000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'name.min' => 'O nome precisa ter mais de 3 caracteres.',
            'name.unique' => 'Nome já cadastrado',
            'price.required' => 'O preço é obrigatório.',
            'price.regex' => 'Informe um valor válido no campo preço (0.00).',
            'description.required' => 'Descrição é obrigatória.',
            'description.min' => 'A descrição precisa ter mais de 3 caracteres',
        ];
    }
}
