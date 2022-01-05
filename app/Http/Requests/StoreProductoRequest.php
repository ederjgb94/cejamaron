<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
            'usuario_id' => 'required',
            'nuevos_productos.*.codigo' => 'required|max:255',
            'nuevos_productos.*.nombre' => 'required|max:255',
            'nuevos_productos.*.presentacion' => 'max:255',
            // 'nuevos_productos.*.iva' => 'regex:/^\d*(\.\d{1,2})?$/',

        ];
    }

    public function messages()
    {
        return [
            'usuario_id.required' => 'Se necesita un usuario para realizar esta acción',
            'nuevos_productos.*.codigo.required' => 'Todos los productos deben contener un código',
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
