<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 签到统计
 * @package Modules\Edu\Entities
 */
class SignTotal extends Model
{
  protected $table = "edu_sign_total";
  protected $fillable = ['site_id', 'user_id', 'total', 'month'];
}
