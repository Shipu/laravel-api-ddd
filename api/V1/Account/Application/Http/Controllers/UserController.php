<?php

namespace Api\V1\Account\Application\Http\Controllers;

use Api\V1\Account\Domain\Models\User;
use Api\V1\Core\Application\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::paginate(25);

        return $users;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }
}