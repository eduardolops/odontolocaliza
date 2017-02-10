<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewConvenantDoctorRequest extends FormRequest
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
            'convenant_id' => 'required|unique:convenants_accepts_doctors,convenant_id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'convenant_id.required' => 'Preencha o campo convêncio corretamente',
            'convenant_id.unique'   => 'Convêncio já adicionado a esse doutor',
        ];
    }
}
