<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 课程|订阅订单
 * Class EduOrder
 * @package App\Models
 */
class EduOrder extends Model
{
    protected $fillable = ['order_id', 'shop_id', 'lesson_id', 'user_id', 'status', 'created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function shop()
    {
        return $this->belongsTo(EduShop::class, 'shop_id');
    }

    /**
     * 会员购买课程检测
     * @param EduLesson $lesson
     * @param User $user
     * @return mixed
     */
    public function isBuy(EduLesson $lesson, User $user): bool
    {
        $where = [
            ['user_id', $user['id']],
            ['status', true],
            ['lesson_id', $lesson['id']],
        ];
        return $this->where($where)->first() ? true : false;
    }
}
