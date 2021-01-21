<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

/**
 * 会员基本资料
 * @package App\Http\Controllers\Member
 */
class UserController extends Controller
{
    public function base()
    {
        return inertia('Member/Info/Base');
    }

    public function password()
    {
        return inertia('Member/Info/Password');
    }

    public function avatar()
    {
        return inertia('Member/Info/Avatar');
    }

    public function Email()
    {
        return inertia('Member/Info/Email');
    }

    public function Mobile()
    {
        return inertia('Member/Info/Mobile');
    }
}
