<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'remember_token', 'email_verified_at',
        'real_name', 'mobile',
        'unionid',  'openid',
        'comment_num', 'fans_num', 'follower_num',
        'address',
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
}
