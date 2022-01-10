<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCuponRequest extends FormRequest
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
            'cupon' => 'max:255',
            'descuento' => 'required|numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'descuento_maximo' => 'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'monto_minimo'=>'numeric|min:0|max:999999.99|regex:/^\d*(\.\d{1,2})?$/',
            'fecha_expiracion'=>'date',
            'usos' => 'numeric|integer|min:1|max:99999999',
            'sucursales' => 'required|json',
            'es_porcentaje' => 'required|boolean',
            'usuario_id' => 'required|numeric|integer|exists:usuarios,id',
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
