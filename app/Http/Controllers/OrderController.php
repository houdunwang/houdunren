<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //创建定单
    public function create()
    {
        $order = app(OrderService::class)->create(
            config('app.name'),
            request('price') == config('hd.subscribe.year.price') ?  config('hd.subscribe.year.price') : config('hd.subscribe.permanent.price'),
            request('payType'),
        );
        return $this->respondWithSuccess($order);
    }
}
