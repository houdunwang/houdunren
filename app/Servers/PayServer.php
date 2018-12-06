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

/**
 * 支付处理服务
 * Class PayServer
 * @package App\Servers
 */
class PayServer
{
    //定单记录
    protected $order;

    /**
     * 创建定单
     * @param array $data
     * @return $this
     */
    public function create(array $data)
    {
        $data['module'] = module_name_from_url();
        $data['order_sn'] = 'U' . auth()->id() . '-' . date('Ymdhis');
        $data['user_id'] = auth()->id();
        $data['status'] = false;
        return $this->order = Order::create($data);
    }

    /**
     * 发起支付
     * @param array $data
     * @return mixed
     */
    public function pay(array $data)
    {
        $data = [
            'WIDout_trade_no' => $this->order['order_sn'],
            'WIDsubject' => $data['subject'],
            'WIDtotal_amount' => $this->order['fee'],
            'WIDbody' => $data['body'],
        ];
        AliPay::PagePay($data);
    }
}