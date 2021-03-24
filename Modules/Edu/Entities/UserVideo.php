<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户观看视频
 * @package Modules\Edu\Entities
 */
class UserVideo extends Model
{
    protected $table = 'edu_user_video';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
