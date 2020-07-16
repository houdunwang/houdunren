<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeRule;
use Auth;
use Illuminate\Http\Request;

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
}
