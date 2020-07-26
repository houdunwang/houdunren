<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Exception\NotFoundException;

class ForgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }

    public function show()
    {
        return view('auth.forget');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account' => ['required'],
            'code' => ['required', new VerificationCodeRule($request->account)],
            'password' => ['required', 'min:5', 'confirmed'],
        ], ['account.required' => '帐号不存在']);

        if ($request->account != session('account')) {
            return response()->json(['message' => '请先发送验证码'], 404);
        }

        $user = User::where($this->account(), $request->account)->firstOrFail();
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return response()->json(['message' => '密码重置成功']);
    }

    public function code(Request $request, CodeService $codeService)
    {
        $request->validate([
            'captcha' => ['required', 'captcha'],
        ], ['code.required' => '图形验证码不能为空']);

        $this->checkUserExists();

        call_user_func([$codeService, $this->account()], $request->account);

        session()->put('account', $request->account);

        return response()->json(['message' => '验证码发送成功']);
    }

    protected function checkUserExists()
    {
        $account = request()->account;
        $hasUser = User::where('email', $account)->orWhere('mobile', $account)->exists();

        if (!$hasUser) {
            throw new NotFoundException('帐号不存在');
        }
    }
}
