<?php

namespace App\Http\Controllers;

use App\Models\SoftSecret;
use App\Rules\CheckSoftSecret;
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
        // $this->authorize('refresh', SoftSecret::class);
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
            "secret" => ['required', "exists:soft_secrets,secret", new CheckSoftSecret()]
        ], ['secret.required' => '密钥不能为空', 'secret.exists' => '口令无效']);

        return $this->respondWithSuccess(SoftSecret::whereSecret(request('secret'))->first());
    }
}
