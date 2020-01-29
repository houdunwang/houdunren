<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
    /**
     * 成功响应
     * @param string $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success(string $message,  $data = [], int $code = 200)
    {
        return response()->json(array_filter([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]), $code);
    }

    /**
     * 失败响应
     * @param string $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message, array $data = [], int $code = 500)
    {
        return response()->json(array_filter([
            'success' => false,
            'message' => $message,
            'data' => $data
        ]), $code);
    }
}
