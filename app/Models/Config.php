<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  protected $fillable = ['config'];
  protected $casts = ['config' => 'array'];
}
