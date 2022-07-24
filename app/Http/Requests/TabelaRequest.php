<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TabelaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $data['nome']  = 'required';

        if($this->request->get('action') == 'edit'){
            $data['id']  = 'required';
        }

        return $data;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
