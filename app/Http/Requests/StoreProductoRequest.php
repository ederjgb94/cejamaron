<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductoRequest extends FormRequest
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
            'nuevos_productos.*.codigo' => 'required|max:255|unique:productos,codigo',
            'nuevos_productos.*.nombre' => 'required|max:255',
            'nuevos_productos.*.presentacion' => 'max:255',
            'nuevos_productos.*.iva' => 'numeric|min:0|max:99.99|regex:/^\d*(\.\d{1,2})?$/',
            'nuevos_productos.*.menudeo' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'nuevos_productos.*.mayoreo' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'nuevos_productos.*.cantidad_mayoreo' => 'numeric|integer|min:0|max:9999',
            'nuevos_productos.*.especial' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'nuevos_productos.*.vendedor' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'nuevos_productos.*.medida_id' => 'numeric|integer|exists:medidas,id',
            'nuevos_productos.*.categoria_id' => 'numeric|integer|exists:categorias,id',
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
