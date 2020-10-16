<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 套餐模型
 * @package App\Models
 */
class Package extends Model
{
  protected $fillable = ['title'];

  /**
   * 模块关联
   * @return BelongsToMany
   */
  public function modules()
  {
    return $this->belongsToMany(Module::class)->withTimestamps();
  }

  /**
   * 模板风格关联
   * @return BelongsToMany
   */
  public function templates()
  {
    return $this->belongsToMany(Template::class, 'template_package')->withTimestamps();
  }
}
