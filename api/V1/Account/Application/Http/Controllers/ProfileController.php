<?php

namespace Api\V1\Account\Application\Http\Controllers;

use Api\V1\Account\Domain\Models\User;
use Api\V1\Core\Application\Http\Controllers\ApiController;

class ProfileController extends ApiController
{
    public function index()
    {
       return $this->guard()->user();
    }
}