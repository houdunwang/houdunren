<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块模型继承的基类
 * @package App\Models
 */
abstract class BaseModel extends Model
{
  public function scopeSite($query)
  {
    return $query->where('site_id', site()['id']);
  }

  public function scopeModule($query)
  {
    return $query->where('module_id', module()['id']);
  }


  public function scopeUser($query, $user_id = null)
  {
    return $query->where('user_id', $user_id ?? user()['id']);
  }
}
