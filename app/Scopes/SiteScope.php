<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * 站点全局作用域
 * @package App\Scopes
 */
class SiteScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (defined('SITEID')) $builder->where('site_id', site()['id']);
    }
}
