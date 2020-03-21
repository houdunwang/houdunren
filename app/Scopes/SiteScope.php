<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * 站点全局作用域
 * @package App\Scopes
 */
class SiteScope implements Scope
{
  public function apply(Builder $builder, Model $model)
  {
    $builder->where('site_id', site()['id']);
  }
}
