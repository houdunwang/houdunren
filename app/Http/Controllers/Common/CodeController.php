<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\ApiController;
use App\Services\SmsService;
use Illuminate\Http\Request;

/**
 * 发送验证码
 * @package App\Http\Controllers\Common
 */
class CodeController extends ApiController
{
  public function __construct()
  {
    $this->middleware('front');
  }

  public function phone(Request $request, SmsService $smsService)
  {
    $smsService->code($request->phone);
    return $this->success('验证码发送成功');
  }
}
