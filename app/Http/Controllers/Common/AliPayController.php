<?php

namespace App\Http\Controllers\Common;

use App\Exceptions\ResponseHttpException;
use App\Models\Pay;
use App\Models\Site;
use Houdunwang\AliPay\AliPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 支付宝通知处理
 * Class PayController
 * @package App\Http\Controllers\Common
 */
class AliPayController extends Controller
{
    protected function site()
    {
        \site(Site::findOrFail(\request('site')));
    }

    /**
     * 异步通知
     * @param AliPay $aliPay
     * @return string
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function async(AliPay $aliPay)
    {
        $config = config_get('alipay', [], 'site');
        $aliPay->config($config);
        if ($aliPay->signCheck()) {
            if ($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
                $pay = Pay::sn($_POST['out_trade_no'])->firstOrFail();
                $pay['status'] = true;
                $pay['alipay_trade_no'] = $_POST['trade_no'];
                $pay->save();
                //通知模块模型
                if ($pay->relation) {
                    $pay->relation->success($pay);
                }
            }
            return 'success';
        }
    }

    /**
     * 通步通知
     * @param AliPay $aliPay
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function sync(AliPay $aliPay)
    {
        //签名验证
        $config = config_get('alipay', [], 'site');
        $aliPay->config($config);
        if ($aliPay->signCheck()) {
            //商户订单号
            $pay = Pay::sn($_GET['out_trade_no'])->firstOrFail();
            $pay['status'] = true;
            $pay['alipay_trade_no'] = htmlspecialchars($_GET['trade_no']);
            $pay->save();
            //通知模块模型
            try {
                $pay->relation->success($pay);
                return redirect_route('member.order.index', '支付成功');
            } catch (\Exception $exception) {
                return redirect_route('member.order.index', '修改模块定单失败，请联系管理员处理');
            }

        } else {
            return redirect('/')->with('info', '更改定单失败，如果您已经支付请联系管理员处理');
        }
    }
}
