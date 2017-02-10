<?php

namespace Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            'upload' => 'required|image|max:1024*1024*2|dimensions:min_width=160,min_height=200',
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
            'upload.required' => 'O campo está vazio',
            'upload.image' => 'O arquivo precisa ser uma imagem nos formatos (jpeg, png, bmp, gif, or svg)',
            'upload.max' => 'Tamanho máximo permitido é de 2 MB',
            'upload.dimensions' => 'O upload tem dimensões de imagem inválidas.',
            'upload.uploaded' => 'Falha no upload da imagem'
        ];
    }
}
