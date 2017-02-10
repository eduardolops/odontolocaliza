<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewSpealizationDoctorRequest extends FormRequest
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
            'specialization_id' => 'required|unique:specialization_doctors,specialization_id',
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
            'specialization_id.required' => 'Preencha o campo especialização corretamente',
            'specialization_id.unique'   => 'Especialização já adicionada a esse doutor',
        ];
    }
}
