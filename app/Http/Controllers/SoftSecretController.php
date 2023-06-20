<?php

namespace App\Http\Controllers;

use App\Models\SoftSecret;
use App\Services\SoftSecretService;
use Auth;
use Exception;
use Illuminate\Http\Request;

class SoftSecretController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    //获取软件密钥
    public function getSoftSecret(Request $request)
    {
        $this->authorize('getSoftSecret', SoftSecret::class);
        $secret = app(SoftSecretService::class)->getSoftSecret(Auth::user());
        return $this->respondWithSuccess($secret);
    }

    //刷新软件密钥
    public function refresh()
    {
        $this->authorize('refresh', SoftSecret::class);
        $secret = app(SoftSecretService::class)->refreshSecret(Auth::user());
        return $this->respondWithSuccess($secret);
    }
}
