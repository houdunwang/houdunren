<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\CodeService;
use Illuminate\Http\Request;

class CodeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function email(Request $request, CodeService $codeService)
  {
    $request->validate(
      [
        'email' => ['required', 'email'],
        'captcha' => ['required', 'captcha'],
      ],
      ['code.required' => '验证码不能为空']
    );

    $codeService->email($request->email);

    return response()->json(['message' => '验证码发送成功']);
  }

  public function mobile(Request $request, CodeService $codeService)
  {
    $request->validate(
      [
        'mobile' => ['required', 'regex:/1\d{10}/'],
        'captcha' => ['required', 'captcha'],
      ],
      ['code.required' => '验证码不能为空', 'mobile.regex' => '手机号格式错误']
    );

    $codeService->mobile($request->mobile);

    return response()->json(['message' => '验证码发送成功']);
  }
}
