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
use Modules\Edu\Services\SubscribeService;
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

        app(OrderService::class)->create('Edu', config('app.name'), config('module.subscribe.price_permanent'), 'douyin', [], $user);
        app(SubscribeService::class)->update($user, config('module.subscribe.price_permanent'));

        return $this->respondOk('添加成功');
    }
}
