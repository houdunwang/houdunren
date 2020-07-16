<?php

namespace App\Http\Controllers\Auth;

use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function show(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request, User $user)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/1\d{10}/i', Rule::unique('users', $this->account())],
            'code' => ['required', new VerificationCodeRule($request->mobile)],
            'password' => ['required', 'confirmed'],
        ], ['code.required' => '验证码不能为空', 'mobile.regex' => '手机号格式错误']);

        $user->password = $request->passsword;
        $user->mobile = $request->mobile;
        $user->save();

        Auth::login($user);
        return response()->json(['message' => '注册成功']);
    }

    public function code(Request $request, CodeService $codeService)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/^1\d{10}$/', Rule::unique('users', 'mobile')],
            'captcha' => ['required', 'captcha'],
        ], ['code.required' => '验证码不能为空', 'mobile.regex' => '手机格式错误', 'mobile.unique' => '手机号已经使用']);

        $codeService->mobile($request->mobile);

        return response()->json(['message' => '验证码发送成功']);
    }
}
