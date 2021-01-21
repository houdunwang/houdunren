<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 修改密码
 * @package App\Http\Controllers\Member
 */
class PasswordController extends Controller
{
    public function index()
    {
        return inertia('Member/Password/Form');
    }
}
