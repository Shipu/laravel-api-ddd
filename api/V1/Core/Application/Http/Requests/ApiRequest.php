<?php

namespace Api\V1\Core\Application\Http\Requests;

use Dingo\Api\Exception\ValidationHttpException;
use Dingo\Api\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ApiRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     *
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        try {
            parent::failedValidation($validator);
        } catch (ValidationHttpException $exception) {
            throw  $exception;
        }
    }
}