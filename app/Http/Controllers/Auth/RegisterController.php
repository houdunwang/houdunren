<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'mobile' => ['required', Rule::unique('users'), 'regex:/^1\d{10}$/'],
            'password' => ['required', 'confirmed'],
            'code' => ['required', new VerificationCodeRule($request->mobile)]
        ]);

        $user->mobile = $request->mobile;
        $user->password = $request->password;
        $user->save();

        Auth::login($user);
        return redirect()->intended()->with('message', '登录成功');
    }

    public function code(Request $request, CodeService $codeService)
    {
        $request->validate([
            'mobile' => ['required', Rule::unique('users'), 'regex:/^1\d{10}$/'],
            'captcha' => ['required', 'captcha'],
        ]);
        $codeService->send($request->mobile);

        return response()->json(['message' => '验证码发送成功']);
    }
}
