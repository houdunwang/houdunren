<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
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

    //发起支付
    public function pay(PayServer $payServer)
    {
        //网站订单号
        $out_trade_no = 'U-' . auth()->id() . '-' . date("Y-m-dhis");

        $data = [
            'WIDout_trade_no' => $out_trade_no,
            'WIDsubject' => '订阅会员',
            'WIDtotal_amount' => 0.01,
            'WIDbody' => '会员订阅',
        ];
        $payServer->alipay($data);
    }
}
