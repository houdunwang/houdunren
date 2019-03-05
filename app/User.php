<?php

namespace App;

use App\Models\Attachment;
use App\Models\Group;
use App\Models\Site;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'site_id',
        'name',
        'email',
        'password',
        'mobile',
        'email_verified_at',
        'token',
        'mobile_verified_at',
        'icon',
        'home',
        'weibo',
        'wechat',
        'github',
        'qq',
        'admin_end',
        'lock',
        'group_id',
        'real_name',
    ];
    protected $casts = ['lock' => 'boolean', 'admin_end' => 'datetime'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 接口用户条件
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        \site(null, true);
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $where['email'] = $username :
            $where['mobile'] = $username;
        $user = self::where($where)->first();
        if ($user && $user->sites->contains(\site())) {
            return $user;
        }
    }

    public function getAvatarAttribute()
    {
        return $this['icon'] ?? asset('images/system/user.jpg');
    }

    /**
     * 会员组关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * 附件关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * 超级管理员
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this['id'] == 1;
    }

    /**
     * 用户站点关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->belongsToMany(Site::class)->as('role')
            ->withPivot('role')->withTimestamps();
    }
}
