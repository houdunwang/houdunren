<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//模块配置
class ModuleConfig extends Model
{
    use HasFactory;

    protected $fillable = ['module', 'data'];

    protected $casts = ['data' => 'array'];
}
