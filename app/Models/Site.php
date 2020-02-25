<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Permission;

/**
 * 站点管理
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
  protected $fillable = ['name', 'keyword', 'description', 'logo', 'icp', 'tel', 'email', 'counter', 'domain'];

  protected $casts = [
    'config' => 'array'
  ];

  /**
   * 公众号关联
   * @return HasMany
   */
  public function weChat(): HasMany
  {
    return $this->hasMany(WeChat::class);
  }

  /**
   * 站点所有权限
   * @return HasMany
   */
  public function permissions(): HasMany
  {
    return $this->hasMany(Permission::class);
  }

  /**
   * 站点用户关联
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function user()
  {
    return $this->belongsToMany(User::class, 'site_users')
      ->withPivot('role')->as('site_user');
  }

  public function admin()
  {
    return $this->user()->wherePivotIn('role', ['admin']);
  }

  public function operator()
  {
    return $this->user()->wherePivotIn('role', ['operator']);
  }
}
