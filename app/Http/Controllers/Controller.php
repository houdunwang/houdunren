<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 成功响应
     *
     * @param string $message
     * @param [type] $data
     * @return void
     */
    public function message(string $message,  $data = [], $code = 0)
    {
        return response(['message' => $message, 'code' => $code, 'data' => $data]);
    }

    /**
     * 失败响应
     *
     * @param string $message
     * @param integer $httpCode
     * @return void
     */
    public function error(string $message, int $httpCode)
    {
        return response(['message' => $message], $httpCode);
    }
}
