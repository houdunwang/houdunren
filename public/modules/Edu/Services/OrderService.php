<?php

namespace Modules\Edu\Services;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Edu\Entities\Duration;
use Modules\Edu\Entities\Order;

/**
 * 定单处理
 * @package Modules\Edu\Services
 */
class OrderService
{
    /**
     * 创建定单
     * @param User $user
     * @param array $order
     * @return mixed
     */
    public function create(User $user, array $order)
    {
        $order['sn'] =  'S' . Auth::id() . '-' . date('Ymdhis');;
        $order['site_id'] = SITEID;
        $order['user_id'] = $user['id'];
        $order['status'] = false;
        return Order::create($order);
    }

    /**
     * 更新定单
     * @param string $sn 定单号
     * @return true|void
     */
    public function update(string $sn)
    {
        DB::beginTransaction();
        $order = Order::where('sn', $sn)->first();

        //定单更改时不重复处理
        if ($order['status'] === true) {
            return true;
        }
        $order['status'] = true;
        $order->save();

        if ($order['type'] === 'subscribe') $this->duration($order);
        DB::commit();
    }

    /**
     * 修改会员周期
     * @param Order $order
     * @return mixed
     */
    protected function duration(Order $order)
    {
        $duration = Duration::firstOrNew([
            'site_id' => $order->site_id,
            'user_id' => $order->user_id
        ]);
        $endTime = $duration['end_time'] ? max($duration['end_time'], now()) : now();
        $duration['begin_time'] = $duration['begin_time'] ?? now();
        $duration['end_time'] = $endTime->addMonth($order['month']);
        return $duration->save();
    }
}
