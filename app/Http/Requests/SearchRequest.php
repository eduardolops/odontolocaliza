<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'state'          => 'required',
            'city'            => 'required',
            // 'specialization'  => 'required',
            // 'name'            => 'required'
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
            'state.required'         => 'Preencha o campo estado',
            'city.required'           => 'Preencha o campo cidade',
            // 'specialization.required' => 'Preencha o campo Especialização',
            // 'name.required'           => 'Preencha o campo nome'
        ];
    }
}
