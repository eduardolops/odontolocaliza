<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name'  => 'required',
            'price' => 'numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return  [
            'name.required'       => 'Preencha o campo Plano de Cobrança',
            // 'name.unique'         => 'Plano de Cobrança já está cadastrado no sistema',
            'price.numeric'       => 'O preço precisa ser um número',
        ];
    }
}
