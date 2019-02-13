<?php

namespace App;

use App\Models\Attachment;
use App\Models\Site;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'mobile',
        'email_verified_at',
        'token',
        'mobile_verified_at',
        'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAvatarAttribute()
    {
        return $this['icon'] ?? asset('images/user.jpg');
    }

    /**
     * 附件关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    public function site()
    {
        return $this->hasMany(Site::class);
    }

    public function isSuperAdmin()
    {
        return $this['id'] == 1;
    }
}
