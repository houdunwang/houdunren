<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * 用户
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

   protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'lock_to_time' => 'datetime'
    ];

    //passport帐号登录
    public function findForPassport($username)
    {
        $validate = [];
        filter_var($username, FILTER_VALIDATE_EMAIL) ? $validate['email'] = $username :
            $this['mobile'] = $username;

        return $this->where($validate)->first();
    }

    /**
     * 超级管理员
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this['id'] === 1;
    }

    /**
     * 用户组
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo($this['group_id']);
    }
}
