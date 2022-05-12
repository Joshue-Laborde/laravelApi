<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\JsonAuthorizationException;
use App\Exceptions\JsonValidationException;
use Illuminate\Contracts\Validation\Validator;

class BaseFormRequest extends FormRequest
{


    //si la funcion authorize se evalua como falso en la clase indexRequest, se ejecuta esta funcion.

    protected function failedAuthorization()
    {
        throw new JsonAuthorizationException;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
