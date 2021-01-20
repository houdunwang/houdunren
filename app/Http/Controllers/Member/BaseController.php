<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

/**
 * 会员基本资料
 * @package App\Http\Controllers\Member
 */
class BaseController extends Controller
{
    /**
     * 修改基本资料
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Auth::user()->fill($request->input())->save();
        return ['message' => '资料成功'];
    }
}
