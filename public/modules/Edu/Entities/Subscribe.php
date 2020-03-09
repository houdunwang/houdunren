<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 套餐
 * Class subscribe
 */
class Subscribe extends Model
{
  protected $table = 'edu_subscribe';
  protected $fillable = ['title', 'site_id', 'ad', 'icon', 'month', 'price'];
}
