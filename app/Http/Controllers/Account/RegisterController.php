<?php

namespace App\Http\Controllers\Account;

use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('account.register');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            // 'name' => ['required', 'min:3', 'max:50'],
            'account' => ['required', $this->accountValidateField(), Rule::unique('users', $this->username())],
            'password' => ['required', 'confirmed'],
            'code' => ['required', new VerificationCodeRule($request->account)]
        ]);

        // $user->name = $request->name;
        $user[$this->username()] = $request->account;
        $user->password = $request->password;
        $user->save();

        Auth::login($user);
        return redirect()->intended()->with('message', '登录成功');
    }

    public function code(Request $request, CodeService $codeService)
    {
        $request->validate([
            'account' => ['required', Rule::unique('users', $this->username()), $this->accountValidateField()],
            'captcha' => ['required', 'captcha'],
        ]);
        $codeService->send($request->account);

        return response()->json(['message' => '验证码发送成功']);
    }
}
