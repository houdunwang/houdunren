<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscribe;
use App\Services\SubscribeService;
use App\Http\Resources\SubscribeResource;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //当前用户订阅资料
    public function info()
    {
        return new SubscribeResource(Auth::user()->subscribe()->whereDate('end_time', '>', now())->first());
    }

    //抖音小黄车订阅订单处理
    public function douyin(Request $request, User $newUser)
    {
        $this->authorize('douyin', Subscribe::class);

        $request->validate([
            'mobile' => ['required', 'regex:/^\d{11}$/'],
            'trade_no' => ['required', Rule::unique('orders', 'trade_no')]
        ]);

        $user = User::where('mobile', $request->mobile)->first() ?? $newUser;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->mobile);
        $user->save();
        if ($user->isSubscribe) {
            return $this->respondError("已经开通过了");
        }
        app(OrderService::class)->create(config('app.name'), config('hd.subscribe.permanent.price'), 'douyin', [], $user);
        app(SubscribeService::class)->update($user, config('hd.subscribe.permanent.price'));

        return $this->respondOk('添加成功');
    }
}
