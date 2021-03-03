<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use PayService;

/**
 * 支付通知处理
 * @package App\Http\Controllers
 */
class PayNotifyController extends Controller
{
    /**
     * 同步通知/支付宝使用
     * @param Module $module
     * @return Redirector|RedirectResponse
     * @throws BindingResolutionException
     */
    public function alipayReturn(Module $module)
    {
        $data = PayService::alipay()->gatway()->verify();
        $class  = "Modules\\{$module['name']}\System\PayController";
        return app($class)->notify($data['out_trade_no'], $data['trade_no']);
    }

    /**
     * 异步通知
     * @return mixed
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function alipayNotify(Module $module)
    {
        $service = PayService::alipay();
        try {
            $data = $service->gatway()->verify();
            $class  = "Modules\\{$module['name']}\System\PayController";
            app($class)->notify($data['out_trade_no'], $data['trade_no']);
            \Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }
        return $service->gatway()->success();
    }
}
