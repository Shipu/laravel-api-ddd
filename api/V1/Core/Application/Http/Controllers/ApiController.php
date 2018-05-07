<?php

namespace Api\V1\Core\Application\Http\Controllers;

use Api\V1\Core\Infrastructure\Traits\ControllerTransaction;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Auth;

abstract class ApiController extends Controller
{
    use ControllerTransaction, Helpers;

    public function guard()
    {
        return Auth::guard();
    }

}