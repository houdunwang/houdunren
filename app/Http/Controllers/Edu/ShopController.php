<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduOrder;
use App\Models\EduShop;
use App\Servers\PayServer;
use Carbon\Carbon;
use Illuminate\Http\Request;

//订阅商品类型
class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //订阅列表
    public function index()
    {
        return view('edu.shop.index');
    }

    /**
     * 发起支付
     * @param EduShop $shop
     * @param PayServer $payServer
     */
    public function pay(EduShop $shop, PayServer $payServer)
    {
        //生成系统支付记录
        $order = $payServer->create(['fee' => $shop['price']]);
        //创建本模块定单记录
        EduOrder::create([
            'order_id' => $order['id'],
            'shop_id' => $shop['id'],
            'lesson_id' => 0,
            'user_id' => auth()->id(),
            'status' => 0,
        ]);
        //发起支付
        $payServer->pay(['subject' => '订阅会员', 'body' => "订阅[{$shop['title']}]会员"]);
    }
}
