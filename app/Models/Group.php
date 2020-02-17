<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户组
 * Class Group
 * @package App\Models
 */
class Group extends Model
{
  protected $fillable = ['name', 'site_num'];
  protected $casts = ['site_num' => 'integer', 'system' => 'boolean'];

  /**
   * 获取套餐
   * @return mixed
   */
  public function package()
  {
    return $this->belongsToMany(Package::class, 'group_package');
  }
}
