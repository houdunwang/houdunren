<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'mobile', 'real_name', 'home', 'avatar', 'qq', 'github', 'wakatime', 'group_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getIsSuperAdminAttribute()
    {
        return $this->id == 1;
    }

    public function getIconAttribute()
    {
        return empty($this->avatar) ? url('/images/avatar.jpg') : $this->avatar;
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'admin_site')->withTimestamps();
    }

    public function masterSites()
    {
        return $this->hasMany(Site::class, 'user_id');
    }

    public function getallSitesAttribute()
    {
        return $this->sites->merge($this->masterSites);
    }

    public function scopeSearch($query, $name)
    {
        if (empty($name)) {
            return $query;
        }

        $name = "%{$name}%";
        return $query
            ->orWhere('name', 'like', $name)
            ->orWhere('id', 'like', $name)
            ->orWhere('email', 'like', $name)
            ->orWhere('mobile', 'like', $name);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function getIsFollowerAttribute()
    {
        return $this->followers()
            ->where('users.id', Auth::id())
            ->exists();
    }

    public function getIsFansAttribute()
    {
        return $this->fans()
            ->where('users.id', Auth::id())
            ->exists();
    }

    public function getNicknameAttribute()
    {
        return empty($this->name) ? '小海豚' : $this->name;
    }

    public static function make(int $id = null)
    {
        $class = 'Modules\\' . module()['name'] . '\Entities\User';
        return $class::find($id ?? auth()->id());
    }

    public function wechatUser()
    {
        return $this->hasMany(WeChatUser::class, 'user_id');
    }
}
