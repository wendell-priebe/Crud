<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientsFormRequest extends FormRequest
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

        $id = $this->id ?? '';

        return [
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email',
                "unique:clients,email,{$id},id", // cria uma ecessao para editar o email do cliente desse id sem dar erro de unico
                // faz um where onde o email é o mesmo do client e o id diferente
            ],
            'cpf_cnpj' => 'required|integer|min:11',
            'cod_city' => 'nullable|string',
        ];

        if($this->method('PUT')){ // aplica as validações apenas para method PUT
            $rules['email'] = 'nullable|email';
            $rules['cod_city'] = 'nullable|string';
        }
    }
}
