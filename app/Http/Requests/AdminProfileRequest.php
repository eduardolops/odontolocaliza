<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
            'name'         => 'required',
            'password'     => 'min:6|confirmed',
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
            'name.required'         => 'Preencha o campo nome',
            // 'password.required'     => 'Preencha o campo senha',
            'password.min'          => 'A senha deve ter pelo menos :min caracteres',
            'password.confirmed'    => 'A confirmação da senha não corresponde',
        ];
    }
}
