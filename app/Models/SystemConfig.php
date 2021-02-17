<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置
 * @package App\Models
 */
class SystemConfig extends Model
{
    use HasFactory;
    protected $fillable = ['config'];
    protected $casts = ['config' => 'array'];
}
