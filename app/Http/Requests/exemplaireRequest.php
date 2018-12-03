<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class exemplaireRequest extends FormRequest
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
            'numero'=> 'required | unique:materiels,numero,'.$this->id
        ];
        // switch($this->method())
        // { case 'GET':
        //   case 'delete':
        //   case 'POST':{
        //    return [
        //        'numero'=> 'required | unique:materiels'
        //    ];
        //  }
        //  case 'PUT':
        //  case 'Patch'
        //  {
        //   return [
        //       'numero'=> 'required | unique:materiels,numero,'.$this->get('id');
        //   ];
        //   }
        // }
    }
}
