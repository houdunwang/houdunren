<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 站点用户
 * Class SiteUser
 * @package App\Models
 */
class SiteUser extends Model
{
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 根据用户获取
     * @param $query
     * @param $user
     * @return mixed
     */
    public function scopeByUser($query, User $user)
    {
        return $query->where('user_id', $user['id']);
    }
}
