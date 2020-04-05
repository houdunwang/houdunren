<?php

namespace Modules\Edu\Entities;

use App\Traits\Module;
use Illuminate\Database\Eloquent\Model;

/**
 * 定单管理
 * @package Modules\Edu\Entities
 */
class Order extends Model
{
  use Module;
  protected $table = 'edu_order';
  protected $fillable = ['site_id', 'user_id', 'price', 'subject', 'sn', 'type', 'month', 'lesson_id', 'status'];
  protected $casts = [
    'status' => 'boolean'
  ];
}
