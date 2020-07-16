<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return view('member.base');
    }

    public function store(Request $request)
    {
        user()->fill($request->input())->save();
        return back()->with('success', '资料修改成功');
    }
}
