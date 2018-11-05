<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 订单
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    protected $fillable = ['module', 'order_sn', 'user_id', 'status', 'alipay_trade_no', 'fee','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
