<?php

namespace App\Console\Commands;

use App\Models\EduLessonBuy;
use App\Models\EduOrder;
use App\Models\EduSubscribe;
use Illuminate\Console\Command;
use DB;

class HoudunrenOrder extends Command
{
    protected $signature = 'hdcms-houdunren-order';

    protected $description = '导入旧订单与购买记录';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->order();
        $this->buy();
        $this->subscribe();
        $this->info('导入成功');
    }

    //会员评阅
    protected function subscribe()
    {
        DB::table('edu_subscribes')->truncate();
        DB::table('hd_houdunren_member')->get()->each(function ($lesson) {
            EduSubscribe::create([
                'user_id' => $lesson->uid,
                'begin_time' => $lesson->starttime,
                'end_time' => $lesson->endtime,
                'created_at' => $lesson->created_at,
                'updated_at' => $lesson->updated_at,
            ]);
        });
    }

    protected function buy()
    {
        DB::table('edu_lesson_buys')->truncate();
        DB::table('hd_houdunren_lesson_buy')
            ->get()->each(function ($lesson) {
                EduLessonBuy::create([
                    'user_id' => $lesson->uid,
                    'lesson_id' => $lesson->lesson_id,
                    'created_at' => $lesson->created_at,
                    'updated_at' => $lesson->updated_at,
                ]);
            });
    }

    protected function order()
    {
        DB::table('edu_orders')->truncate();
        DB::table('hd_houdunren_order')->where('status', 1)
            ->get()->each(function ($order) {
                EduOrder::create([
                    'user_id' => $order->uid,
                    'shop_id' => $order->shop_id,
                    'lesson_id' => $order->lesson_id,
                    'order_sn' => $order->order_sn,
                    'status' => $order->status,
                    'alipay_trade_no' => $order->alipay_trade_no,
                    'fee' => $order->fee,
                    'type' => $order->type,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                ]);
            });
    }
}
