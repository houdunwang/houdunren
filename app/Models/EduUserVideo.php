<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员观看视频记录
 * Class EduUserVideo
 * @package App\Models
 */
class EduUserVideo extends Model
{
    protected $fillable = ['lesson_id'];

    /**
     * 会员关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 视频关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function video()
    {
        return $this->belongsTo(EduVideo::class, 'video_id');
    }
}
