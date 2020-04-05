<?php

namespace Modules\Edu\Entities;

use App\Traits\Module;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员订阅
 * Class subscribe
 */
class Subscribe extends Model
{
  use Module;
  protected $table = 'edu_subscribe';
  protected $fillable = ['title', 'site_id', 'ad', 'icon', 'month', 'price'];
}
