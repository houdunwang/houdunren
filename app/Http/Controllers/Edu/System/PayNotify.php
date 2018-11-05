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

namespace App\Http\Controllers\Edu\System;

//支付通知
use App\Models\EduOrder;
use App\Models\EduSubscribe;
use App\Models\Order;
use Carbon\Carbon;

class PayNotify
{
    //同步
    public function sync(Order $payOrder)
    {
        return $this->setMemberPeriod($payOrder);
    }

    //异步
    public function async(Order $payOrder)
    {
        return $this->setMemberPeriod($payOrder);
    }

    /**
     * 设置会员周期
     * 目前对课程单独购买没有处理
     * @param Order $payOrder
     * @return mixed
     */
    protected function setMemberPeriod(Order $payOrder)
    {
        $order = EduOrder::where('order_id', $payOrder['id'])->first();
        //根据模块定单状态处理，防止重复设置会员时间
        if (!$order['status']) {
            $now = new Carbon();
            //获取旧订单数据
            $subscribe = EduSubscribe::firstOrNew(
                ['user_id' => $order['user_id']],
                ['begin_time' => new Carbon(), 'end_time' => new Carbon()]);
            //设置会员时间
            if ($subscribe['end_time'] < $now) {
                $subscribe['end_time'] = $now->addMonths($order->shop['buy_month']);
            } else {
                $subscribe['end_time'] = $subscribe['end_time']->addMonths($order->shop['buy_month']);
            }
            $subscribe->save();
            //修改模块定单状态
            $order['status'] = true;
            $order->save();
        }
        return redirect('/')->with('success', '恭喜你向高手更进了一步，你可以在会员中心查看到定单状态');
    }
}