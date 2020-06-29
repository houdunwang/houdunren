<?php

namespace App\Http\Controllers\Account;

use App\Http\Traits\Account;
use App\Traits\AccountTrait;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('account/login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'account' => ['required', $this->accountValidateField()],
            'password' => ['required'],
            'captcha' => ['required', 'captcha'],
        ]);

        $isLogin = Auth::attempt($this->accounts(), $request->remember);

        if ($isLogin) {
            return redirect()->intended('/')->with('message', '登录成功');
        }
        return back()->with('danger', '帐号或密码错误')->withInput();
    }
}
