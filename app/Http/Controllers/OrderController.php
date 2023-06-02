<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //创建定单
    public function create(Package $package)
    {
        $order = app(OrderService::class)->create(config('app.name'), $package, request('payType'));
        return $this->respondWithSuccess($order);
    }
}
