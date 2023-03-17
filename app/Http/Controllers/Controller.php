<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function success(string $message = '', $data = [])
    {
        return ["message" => $message, "code" => 0, "data" => $data];
    }

    protected function error(string $message = '', $data = [], $code = 403)
    {
        return ["message" => $message, "code" => $code, "data" => $data];
    }
}
