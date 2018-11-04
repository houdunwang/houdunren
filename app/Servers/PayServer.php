<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/4
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\Order;
use Houdunwang\Alipay\AliPay;

class PayServer
{
    public function __construct()
    {
        $this->config();
    }

    //配置
    protected function config()
    {
        $config = config_get('admin.alipay', []);
        $config['notify_url'] = route('common.alipay.async');
        $config['return_url'] = route('common.alipay.sync');
        AliPay::config($config);
    }

    /**
     * 发起支付
     * @param array $data
     * @return mixed
     */
    public function alipay(array $data)
    {
        Order::create([
            'order_sn' => $data['WIDout_trade_no'],
            'status' => false,
            'user_id' => auth()->id(),
            'fee' => $data['WIDtotal_amount'],
        ]);
        AliPay::PagePay($data);
    }
}