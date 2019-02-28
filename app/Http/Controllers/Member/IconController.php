<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\UserMemberRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 修改会员头像
 * Class IconController
 * @package App\Http\Controllers\Member
 */
class IconController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('member.icon.index', compact('user'));
    }

    public function store(UserMemberRequest $request)
    {
        auth()->user()->update($request->input());
        return back()->with('success', '资料修改成功');
    }
}
