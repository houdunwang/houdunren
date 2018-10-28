<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduOrder;
use App\Models\EduShop;
use Carbon\Carbon;
use Houdunwang\Alipay\AliPay;
use Illuminate\Http\Request;

//订单管理
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shop(EduShop $shop, EduOrder $order)
    {
        $data = [
            'WIDout_trade_no' => auth()->id() . '-' . new Carbon(),
            'WIDsubject' => '订阅会员',
            'WIDtotal_amount' => 0.01,
            'WIDbody' => '定单描述',
        ];
        AliPay::PagePay($data);
    }
}
