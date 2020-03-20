<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 点赞
 * @package Modules\Edu\Entities
 */
class Favour extends Model
{
  protected $table = 'edu_favour';
  protected $fillable = ['site_id', 'user_id'];
}
