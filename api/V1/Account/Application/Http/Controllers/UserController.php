<?php

namespace Api\V1\Account\Application\Http\Controllers;

use Api\V1\Account\Domain\Models\User;
use Api\V1\Core\Application\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function allUsers()
    {
        $users = User::paginate(25);

        return $this->response->array($users);
    }

    public function singleUser($id)
    {
        $user = User::findOrFail($id);

        return $this->response->array($user->toArray());
    }
}