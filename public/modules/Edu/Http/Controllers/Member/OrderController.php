<?php

namespace Modules\Edu\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Order;

/**
 * 定单管理
 * @package Modules\Edu\Http\Controllers\Member
 */
class OrderController extends ApiController
{
    public function index()
    {
        return Order::where('user_id', Auth::id())->where('status', 1)->paginate(10);
    }
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return $this->success('删除成功');
    }
}
