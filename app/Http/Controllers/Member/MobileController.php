<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * 手机号绑定
 * @package App\Http\Controllers\Member
 */
class MobileController extends Controller
{
  public function index()
  {
    return view('member.mobile.index');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'mobile' => ['required', 'regex:/^1\d{10}$/'],
      'code' => ['required', new VerificationCodeRule($request->mobile)],
    ], ['mobile.regex' => '手机号格式错误']);

    $user  = Auth::user();
    $user->mobile = $request->mobile;
    $user->save();
    return response()->json(['message' => '手机号绑定成功']);
  }

  public function code(Request $request, CodeService $codeService)
  {
    $request->validate([
      'mobile' => ['required', 'regex:/^1\d{10}$/', Rule::unique('users', 'mobile')->ignore(user())],
      'captcha' => ['required', 'captcha'],
    ], ['code.required' => '验证码不能为空', 'mobile.regex' => '手机格式错误', 'mobile.unique' => '手机号已经使用']);

    $codeService->mobile($request->mobile);

    return response()->json(['message' => '验证码发送成功']);
  }
}
