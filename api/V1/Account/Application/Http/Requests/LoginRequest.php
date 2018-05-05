<?php

namespace Api\V1\Account\Application\Http\Requests;

use Api\V1\Core\Application\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}