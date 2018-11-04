<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

//课程订单记录
class EduOrder extends Model
{
    protected $fillable = ['user_id', 'order_id', 'lesson_id', 'shop_id', 'created_at', 'updated_at'];

    /**
     * 会员购买课程检测
     * @param EduLesson $lesson
     * @param User $user
     * @return mixed
     */
    public function isBuy(EduLesson $lesson, User $user)
    {
        return $this->where('user_id', $user['id'])->where('lesson_id', $lesson['id'])->first();
    }
}
