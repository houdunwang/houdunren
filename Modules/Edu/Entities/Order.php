<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 订单
 * @package Modules\Edu\Entities
 */
class Order extends Model
{
    protected $table = 'edu_order';
    protected $types = ['subscribe' => '订阅会员', 'lesson' => '购买课程'];
    protected $fillable = ['lesson_id', 'site_id', 'user_id', 'price', 'subject', 'sn', 'type', 'month', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
