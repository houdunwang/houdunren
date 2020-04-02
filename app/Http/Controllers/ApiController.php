<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
  /**
   * 直播响应JSON数据
   * @param array $data
   * @param int $code
   * @return \Illuminate\Http\JsonResponse
   */
  protected function json($data = [], int $code = 200)
  {
    return response()->json($data, $code);
  }
  /**
   * 成功响应
   * @param string $message
   * @param array $data
   * @param int $code
   * @return \Illuminate\Http\JsonResponse
   */
  protected function success(string $message, $data = [], int $code = 200)
  {
    return response()->json([
      'status' => true,
      'message' => $message,
      'data' => $data
    ], $code);
  }

  /**
   * 失败响应
   * @param string $message
   * @param array $data
   * @param int $code
   * @return \Illuminate\Http\JsonResponse
   */
  protected function error(string $message, array $data = [], int $code = 403)
  {
    return request()->expectsJson() ?
      response()->json([
        'status' => false,
        'message' => $message,
        'data' => $data
      ], $code) :
      back()->withInput()->with('error', $message);
  }
}
