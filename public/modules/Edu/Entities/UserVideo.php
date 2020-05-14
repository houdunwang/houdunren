<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 用户观看记录
 * @package Modules\Edu\Entities
 */
class UserVideo extends Model
{
    protected $table = 'edu_user_video';
    protected $fillable = [];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
