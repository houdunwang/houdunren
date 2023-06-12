<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftSecretRequest;
use App\Http\Requests\UpdateSoftSecretRequest;
use App\Models\SoftSecret;
use App\Services\SoftService;
use Auth;

class SoftSecretController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    //刷新软件密钥
    public function refresh()
    {
        app(SoftService::class)->refreshSecret(Auth::user(), true);
        return $this->respondOk('软件密钥刷新成功');
    }
}
