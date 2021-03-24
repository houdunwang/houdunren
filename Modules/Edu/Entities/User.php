<?php

namespace Modules\Edu\Entities;

use App\Models\User as Model;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;

/**
 * 用户
 * @package Modules\Edu\Entities
 */
class User extends Model
{
    /**
     * 实例化用户
     * @param Model $user
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public static function make(Model $user = null)
    {
        if ($user) {
            return self::find($user['id']);
        } else {
            return self::class;
        }
    }

    /**
     * 订单
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->where('site_id', site()['id']);
    }

    /**
     * 贴子
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function topics()
    {
        return $this->hasMany(Topic::class)->where('site_id', site()['id']);
    }

    /**
     * 视频关联
     * @return mixed
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'edu_user_video')
            ->orderBy('edu_user_video.created_at', 'desc')
            ->withPivot(['created_at', 'updated_at'])
            ->withTimestamps();
    }

    /**
     * 会员周期
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function duration()
    {
        return $this->hasOne(Duration::class)->where('site_id', site()['id']);
    }
}
