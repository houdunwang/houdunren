<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 签到
 * @package Modules\Edu\Entities
 */
class Sign extends Model
{
    protected $table = "edu_sign";
    protected $fillable = ['content', 'mood', 'site_id', 'user_id'];
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
    /**
     * 用户今日是否签到
     * @param User $user
     * @return bool
     */
    public static function todayIsSign(User $user)
    {
        return (bool) self::whereDate('created_at', now())->where('user_id', $user['id'])->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
