<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 站点
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $fillable = ['name', 'description'];

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->as('role')->withTimestamps();
    }

    public function getAdminAttribute()
    {
        return $this->user()->wherePivot('role', 'admin')->first();
    }
}
