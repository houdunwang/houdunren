<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Site extends Model
{
  protected $fillable = ['title', 'domain', 'module_id', 'user_id'];

  protected $casts = [
    'config' => 'array',
  ];

  //默认模块
  public function module()
  {
    return $this->belongsTo(Module::class);
  }

  //站点可使用的所有模块
  public function getModulesAttribute()
  {
    return $this->master->group->modules;
  }

  //站长
  public function master()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  //管理员
  public function admins()
  {
    return $this->belongsToMany(User::class, 'admin_site');
  }

  public function roles()
  {
    return $this->hasMany(Role::class);
  }

  public function isAdmin(User $user)
  {
    return $this->admins->contains($user);
  }

  public function wechats()
  {
    return $this->hasMany(WeChat::class, 'site_id');
  }
}
