<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProductoRequest extends FormRequest
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
            'usuario_id' => 'required|numeric|integer|exists:usuarios,id',
            'codigo' => 'max:255|unique:productos,codigo',
            'nombre' => 'max:255',
            'presentacion' => 'max:255',
            'iva' => 'numeric|min:0|max:99.99|regex:/^\d*(\.\d{1,2})?$/',
            'menudeo' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'mayoreo' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'cantidad_mayoreo' => 'numeric|integer|min:0|max:9999',
            'especial' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'vendedor' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'medida_id' => 'numeric|integer|exists:medidas,id',
            'categoria_id' => 'numeric|integer|exists:categorias,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            jsend_fail($errors)
        );
    }
}
