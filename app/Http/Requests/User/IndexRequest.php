<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;



//El motivo por el cual se creo una clase aparte para las exceptiones es porque siempre sera lo mismo.
use App\Http\Requests\BaseFormRequest;

//class IndexRequest extends FormRequest
class IndexRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //si el usuario esta autorizado a realizar dicha accion
    public function authorize()
    {
        //return false;  // si siempre se lo deja a false, nunca pasara a los rules y se ejecuta ña excepcion de AuthenticateException.
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

        ];
    }

    //si la funcion authorize se evalua como falso, se va a la clase BaseFormRequest y se ejecutara las excepciones



}
