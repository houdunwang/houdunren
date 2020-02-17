<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 套餐管理
 * Class Package
 * @package App\Models
 */
class Package extends Model
{
  protected $fillable = ['name'];
  protected $casts = ['modules' => 'array', 'templates' => 'array'];

  /**
   * 套餐模块
   * @return mixed
   */
  public function module()
  {
    return $this->belongsToMany(Module::class, 'module_package');
  }

  public function group()
  {
    return $this->belongsToMany(Group::class, 'group_package');
  }
}
