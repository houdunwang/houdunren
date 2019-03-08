<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Exceptions\ResponseHttpException;
use Houdunwang\AliPay\AliPay;
use Illuminate\Database\Eloquent\Model;

/**
 * 支付服务
 * Class PayServer
 * @package App\Servers
 */
class PayServer
{
    /**
     * 网页支付
     * @param Model $model 模块定单模型
     * @return mixed
     * @throws ResponseHttpException
     */
    public function aliPay(Model $model)
    {
        try {
            $this->createPayOrder($model);
            $aliPay = app()->make(AliPay::class);
            //支付宝配置
            $config = config_get('alipay', [], 'site');
            $config['notify_url'] = route('common.alipay.async', \site()['id']);
            $config['return_url'] = route('common.alipay.sync', \site()['id']);
            $aliPay->config($config);
            //定单信息
            $data = [
                'WIDout_trade_no' => $this->sn($model),//支付订单号和商品定单号不同
                'WIDtotal_amount' => $model->price(),//付款金额单位元
                'WIDsubject' => $model->subject(),//商品名称
                'WIDbody' => $model->subject(),//商品描述
            ];
            return $aliPay->pagePay($data);
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }

    protected function sn(Model $model)
    {
        return sprintf("S%sM%s-U%s-SN%s", \site()['id'], \module()['id'], auth()->id(), $model->sn());
    }

    /**
     * 创建支付记录
     * @param Model $model
     */
    protected function createPayOrder(Model $model)
    {
        $model->pay()->create([
            'site_id' => \site()['id'],
            'module_id' => \module()['id'],
            'user_id' => auth()->id(),
            'subject' => $model->subject(),
            'price' => $model->price(),
            'sn' => $this->sn($model),
        ]);
    }
}