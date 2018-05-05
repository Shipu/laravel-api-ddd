<?php

namespace Api\V1\Account\Application\Http\Requests;

use Api\V1\Core\Application\Http\Requests\ApiRequest;

class SignUpRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}