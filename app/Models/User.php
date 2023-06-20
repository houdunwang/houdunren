<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "mobile",
        'name',
        "nickname",
        'email',
        'password',
        'avatar',
        'home',
        'github',
        'weibo',
        'wechat',
        'qq',
        'openid',
        'address',
        'real_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'real_name',
        'mobile',
        'unionid',
        'openid',
        'comment_num',
        'fans_num',
        'follower_num',
        'address',
        // 'secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_lock' => 'bool'
    ];

    //超级管理员
    public function getIsAdministratorAttribute()
    {
        return $this->id == 1;
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    //订单
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //视频观看历史
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'video_play_histories', 'user_id', 'video_id')
            ->withTimestamps();
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    //会员订阅
    public function subscribe()
    {
        return $this->hasOne(Subscribe::class);
    }

    public function getIsSubscribeAttribute()
    {
        return $this->subscribe && $this->subscribe->end_time > now();
    }

    //签到信息
    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    //学习课程历史
    public function playLessons()
    {
        return $this->belongsToMany(Lesson::class, 'video_play_histories');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionAnswer()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    //评论列表
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    //软件密钥
    public function softSecret()
    {
        return $this->hasOne(SoftSecret::class);
    }

    //软件验证令牌
    public function softTokens()
    {
        return $this->hasMany(SoftToken::class);
    }
}
