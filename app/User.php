<?php

namespace App;

use App\Models\Site;
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
    protected $appends = ['is_super_admin'];

    /**
     * passport帐号登录
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        $validate = [];
        filter_var($username, FILTER_VALIDATE_EMAIL) ? $validate['email'] = $username :
            $this['mobile'] = $username;

        return $this->where($validate)->first();
    }

    /**
     * 站点关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function site(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Site::class, 'site_users')
            ->withPivot(['role', 'site_id'])->as('role');
    }

    /**
     * 超级管理员
     * @return bool
     */
    public function getIsSuperAdminAttribute(): bool
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
