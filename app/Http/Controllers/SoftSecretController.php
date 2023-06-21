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
        if (user()->softSecret)
            return $this->respondWithSuccess(user()->softSecret);
        else
            return $this->respondError("密钥不存在");
    }

    //刷新软件密钥
    public function refresh()
    {
        $secret = app(SoftSecretService::class)->createOrUpdateSoftSecret(Auth::user());
        return $this->respondWithSuccess($secret);
    }
}
