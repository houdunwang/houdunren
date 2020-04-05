<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 会员周期
 * @package Modules\Edu\Entities
 */
class Duration extends Model
{
  protected $table = 'edu_duration';
  protected $fillable = ['site_id', 'user_id', 'begin_time', 'end_time'];

  protected $casts = [
    'begin_time' => 'datetime',
    'end_time' => 'datetime',
  ];
}
