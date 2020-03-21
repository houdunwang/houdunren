<?php

namespace App\Traits;

use App\Scopes\SiteScope;

/**
 * 模块公共模块业务
 */
trait Module
{
  protected static function booted()
  {
    static::addGlobalScope(new SiteScope);
  }
}
