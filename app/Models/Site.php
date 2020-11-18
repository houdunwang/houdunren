<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Role;

/**
 * 站点模型
 * @package App\Models
 */
class Site extends Model
{

  protected $fillable = ['title', 'domain', 'module_id', 'user_id', 'template_id',];

  protected $casts = [
    'config' => 'array',
  ];

  /**
   * 默认模块
   * @return BelongsTo
   */
  public function module()
  {
    return $this->belongsTo(Module::class);
  }

  /**
   * 站点可使用的所有模块
   * @return mixed
   */
  public function getModulesAttribute()
  {
    return $this->master->group->modules;
  }

  /**
   * 当前站点使用的模板
   * @return BelongsTo
   */
  public function template()
  {
    return $this->belongsTo(Template::class, 'template_id');
  }

  /**
   * 模板列表
   * @return mixed
   */
  public function getTemplatesAttribute()
  {
    return $this->master->group->templates;
  }

  /**
   * 站长
   * @return BelongsTo
   */
  public function master()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  /**
   * 管理员
   * @return BelongsToMany
   */
  public function admins()
  {
    return $this->belongsToMany(User::class, 'admin_site');
  }

  /**
   * 菜色列表
   * @return HasMany
   */
  public function roles()
  {
    return $this->hasMany(Role::class);
  }

  /**
   * 用户是否为管理员
   * @param User $user
   * @return mixed
   */
  public function isAdmin(User $user)
  {
    return $this->admins->contains($user);
  }

  /**
   * 公众号关联
   * @return HasMany
   */
  public function wechats()
  {
    return $this->hasMany(WeChat::class, 'site_id');
  }

  /**
   * 站点菜单
   * @return HasMany
   */
  public function menus()
  {
    return $this->hasMany(Menu::class);
  }
}
