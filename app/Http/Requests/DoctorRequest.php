<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'number_cro'   => 'required',
            'doc_cpf'      => 'required|cpf',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'specialization' => 'required',
            // 'office_hours' => 'required',
            'zip_code'     => 'required',
            'address'      => 'required',
            'number'       => 'required|numeric',
            'neighborhood' => 'required',
            'states'       => 'required',
            'city'         => 'required',
            'country'      => 'required|numeric',
            'phone'        => 'required',
            'cell_phone'   => 'required',
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
                'doc_cpf.required'      => 'Preencha o campo CPF',
                'doc_cpf.cpf'           => 'CPF inválido',
                'number_cro.required'   => 'Preencha o campo Número do CRO',
                'email.required'        => 'Preencha o campo email',
                'email.unique'          => 'Email já está sendo utilizado',
                'email.email'           => 'Email inválido',
                'password.required'     => 'Preencha o campo senha',
                'password.min'          => 'A senha deve ter pelo menos :min caracteres',
                'password.confirmed'     => 'A confirmação da senha não corresponde',
                'specialization.required' => 'Preencha o campo Especialização',
                // 'office_hours.required' => 'Preencha o campo Horário de Atendimento',
                'zip_code.required'     => 'Preencha o campo CEP',
                'address.required'      => 'Preencha o campo endereço',
                'number.required'       => 'Preencha o campo número',
                'number.numeric'        => 'Formato inválido, são aceitos somente números nesse campo',
                'neighborhood.required' => 'Preencha o campo bairro',
                'states.required'       => 'Preencha o campo estado',
                // 'states.numeric'        => 'Formato inválido, são aceitos somente números nesse campo',
                'city.required'         => 'Preencha o campo cidade',
                // 'city.numeric'          => 'Formato inválido, são aceitos somente números nesse campo',
                'country.required'      => 'Preencha o campo pais',
                'country.numeric'       => 'Formato inválido, são aceitos somente números nesse campo',
                'phone.required'        => 'Preencha o campo telefone',
                'cell_phone.required'   => 'Preencha o campo celular',
            ];
    }

}
