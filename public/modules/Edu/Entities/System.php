<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\Traits\Module;
use Illuminate\Database\Eloquent\Model;

/**
 * 系统课程
 * Class System
 */
class System extends Model
{
  // use Module;

  protected $table = 'edu_system';
  protected $fillable = ['title', 'description', 'preview', 'site_id', 'user_id'];
  protected static function booted()
  {
    static::addGlobalScope(new SiteScope);
  }
  public function lesson()
  {
    return $this->belongsToMany(Lesson::class, 'edu_system_lesson');
  }
}
