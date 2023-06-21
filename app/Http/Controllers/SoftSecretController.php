<?php

namespace App\Http\Controllers;

use App\Models\SoftSecret;
use App\Services\SoftSecretService;
use Auth;
use Closure;
use Exception;
use Illuminate\Http\Request;

class SoftSecretController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(['checkSoftSecret']);
    }

    //获取软件密钥
    public function getSoftSecret(Request $request)
    {
        $secret = user()->softSecret;
        return $secret ?
            $this->respondWithSuccess($secret) :
            $this->respondError("密钥不存在");
    }

    //刷新软件密钥
    public function refresh()
    {
        if (!user()->softSecret) return $this->respondNotFound("你没有软件密钥");
        $secret = app(SoftSecretService::class)->refreshSoftSecret(Auth::user());
        return $this->respondWithSuccess($secret);
    }

    /**
     * 验证软件密钥
     * @param Request $request
     */
    public function checkSoftSecret(Request $request)
    {
        $request->validate([
            "secret" => ['required', "exists:soft_secrets,secret"]
        ]);

        $state = app(SoftSecretService::class)->checkSoftSecret($request->secret);
        return $state ? $this->respondOk("密钥验证通过") : $this->respondForbidden("密钥错误");
    }
}
