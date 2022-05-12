<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\JsonAuthorizationException;
use App\Exceptions\JsonValidationException;
use Illuminate\Contracts\Validation\Validator;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //si el usuario esta autorizado a realizar dicha accion
    public function authorize()
    {
        //return false;  // si siempre se lo deja a true, nunca pasara a los rules.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //reglas de validación
    public function rules()
    {
        return [
            'foo' => 'required'
        ];
    }

    //si la funcion authorize se evalua como falso, se ejecuta esta funcion.
    protected function failedAuthorization()
    {
        throw new JsonAuthorizationException;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }


}
