<?php

namespace App\Http\Controllers\Common;

use Houdunwang\Alipay\AliPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 支付通知
 * Class AliPayNotifyController
 * @package App\Http\Controllers\Common
 */
class AliPayNotifyController extends Controller
{
    /**
     * 同步通知
     * @param Request $request
     */
    public function sync(Request $request)
    {

        //签名验证
        if (AliPay::signCheck()) {
            //商户订单号
            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
            //支付宝交易号
            $trade_no = htmlspecialchars($_GET['trade_no']);
            echo "验证成功<br />支付宝交易号：" . $trade_no;
        } else {
            echo '支付失败';
        }
    }

    /**
     * 异步通知
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function async(Request $request)
    {
        $alipaySevice = new \AlipayTradeService(config_get('admin.alipay'));
        //签名验证
        if (!Alipay::signCheck()) {
            return 'fail';
        } else {
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            //交易状态
            $trade_status = $_POST['trade_status'];
            if ($_POST['trade_status'] == 'TRADE_FINISHED') {
                //支付成功时的业务处理
            } elseif ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //交易完成时的业务处理
            }
            //必须返回以下内容给支付宝
            return 'success';
        }
    }
}
