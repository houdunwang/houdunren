<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\AccountRule;
use App\Rules\CodeRule;
use App\Models\User;
use UserService;
use CodeService;
use Auth;
use Hash;

/**
 * 帐号登录注册管理
 * @package App\Api\User
 */
class CaptchaController extends Controller
{

    public function create(Request $request)
    {
        return \Captcha::create('default', true);
    }
}
