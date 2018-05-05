<?php

namespace Api\V1\Core\Application\Http\Controllers;

use Api\V1\Core\Infrastructure\Traits\ControllerTransaction;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
    use ControllerTransaction, Helpers;

}