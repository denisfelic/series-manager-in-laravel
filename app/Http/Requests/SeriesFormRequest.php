<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => 'required',
            'nome' => 'min:3',
        ];
    }

    public function messages()
    {
        return [
          'nome.require' => 'O campo nome é obrigatório.',
          'nome.min' => 'O campo :attribute precisar ter ao menos três caracteres.',
        ];
    }
}
