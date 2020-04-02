<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块
 * Class Module
 * @package App\Models
 */
class Module extends Model
{
  protected $fillable = ['title', 'name', 'version'];
  protected $casts = ['subscribe' => 'boolean'];
}
