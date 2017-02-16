<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerAdminRequest extends FormRequest
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
            'email'        => 'required|email|unique:admins,email',
            'password'     => 'required|min:6|confirmed',
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
            'email.required'        => 'Preencha o campo email',
            'email.unique'          => 'Email já está sendo utilizado',
            'email.email'           => 'Email inválido',
            'password.required'     => 'Preencha o campo senha',
            'password.min'          => 'A senha deve ter pelo menos :min caracteres',
            'password.confirmed'    => 'A confirmação da senha não corresponde',
        ];
    }
}
