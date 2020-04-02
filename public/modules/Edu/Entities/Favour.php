<?php

namespace Modules\Edu\Entities;

use App\Traits\Module;
use Illuminate\Database\Eloquent\Model;

/**
 * 点赞
 * @package Modules\Edu\Entities
 */
class Favour extends Model
{
  use Module;
  protected $table = 'edu_favour';
  protected $fillable = ['site_id', 'user_id'];
}
