<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class ProductRequest extends FormRequest
{
    /**
     * rules
     *
     * @return void
     */
    public function rules()

    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|numeric',
            'store' => 'required|numeric',
            'image' => 'required'
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
            'status'   => '402',
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
            'description.required' => 'La descripcion es requerida',
            'price.required' => 'El precio es requerido',
            'category.required' => 'La categoria es requerida',
            'store.required' => 'La tienda es requerida',
            'image.required' => 'La imagen es requerida'

        ];
    }
}
