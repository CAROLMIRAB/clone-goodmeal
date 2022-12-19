<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * rules
     *
     * @return void
     */
    public function rules()

    {
        return [
            'name' => 'required|string|max:255|unique:stores',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'delivery' => 'required',
        ];
    }

    /**
     * failedValidation
     *
     * @param  mixed $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => 400,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ]));
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => 'Nombre es requerido',
            'name.unique' => 'La tienda ya ha sido agregada',
            'address.required' => 'La direccion es requerida',
            'lat.required' => 'la latitud y el precio es requerido',
            'long.required' => 'La longitud y el precio es requerida',
            'delivery.required' => 'El tipo de delivery es requerido'

        ];
    }
}
