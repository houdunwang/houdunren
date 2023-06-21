<?php

namespace App\Http\Controllers;

use App\Models\Soft;
use App\Models\SoftSecret;
use App\Models\SoftToken;
use App\Rules\checkSoftSecret;
use App\Services\SoftTokenService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 软件使用TOKEN
 */
class SoftTokenController extends Controller
{
    //获取软件令牌TOKEN
    public function getSoftToken(Request $request)
    {
        $request->validate([
            "secret" => ['required', "exists:soft_secrets,secret", new checkSoftSecret()],
            'app' => ['required', 'exists:softs,name'],
        ]);
        $token = app(SoftTokenService::class)->createSoftToken(request('secret'), request("app"));
        return $this->respondWithSuccess($token);
    }

    //校对令牌
    public function checkSoftToken(Request $request)
    {
        $request->validate([
            'token' => ['required', 'exists:soft_tokens,token', function (string $attribute, mixed $value, Closure $fail) {
                $isValid = app(SoftTokenService::class)->checkToken($value);
                if (!$isValid) $fail('令牌无效');
            }],
        ]);

        return $this->respondOk('令牌正确');
    }
}
