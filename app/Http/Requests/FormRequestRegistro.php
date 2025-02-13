<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestRegistro extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $request=[];
        if ($this->method() == "POST") {
            $request = [
                'nome'=> 'required',
                'dns'=> 'required',
                'ip'=> 'required',
                'data_registro'=> 'required'
            ];
        }
        return $request;
    }
}
