<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use Auth;
use UserService;

/**
 * 用户资料
 * @package App\Http\Controllers\Api\User
 */
class UserController extends Controller
{
    public function info()
    {
        return Auth::user();
    }
}
