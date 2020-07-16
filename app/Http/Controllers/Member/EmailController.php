<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmailController extends Controller
{
    public function index()
    {
        return view('member.email');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'code' => ['required', new VerificationCodeRule($request->email)],
        ]);

        $user  = Auth::user();
        $user->email = $request->email;
        $user->save();
        return response()->json(['message' => '邮箱绑定成功']);
    }

    public function code(Request $request, CodeService $codeService)
    {
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'captcha' => ['required', 'captcha'],
        ], ['code.required' => '验证码不能为空', 'email.unique' => '邮箱已使用']);

        $codeService->email($request->email);

        return response()->json(['message' => '验证码发送成功']);
    }
}
