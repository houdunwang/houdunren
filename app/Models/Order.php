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
    protected $fillable = ['user_id', 'lesson_id', 'order_sn', 'status', 'alipay_trade_no', 'fee', 'type', 'shop_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
