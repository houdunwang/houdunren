<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeRule;
use Auth;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index()
    {
        return view('member.mobile');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mobile' => ['required', 'regex:/^1\d{10}$/'],
            'code' => ['required', new VerificationCodeRule($request->mobile)],
        ], ['mobile.regex' => '手机号格式错误']);

        $user  = Auth::user();
        $user->email = $request->email;
        $user->save();
        return response()->json(['message' => '邮箱绑定成功']);
    }
}
