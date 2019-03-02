<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\UserMemberRequest;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('member.mail.index', compact('user'));
    }

    public function store(UserMemberRequest $request)
    {
        auth()->user()->update($request->input());
        return back()->with('success', '资料修改成功');
    }
}
