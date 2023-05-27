<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//模块配置
class Config extends BaseModel
{
    use HasFactory;

    protected $table = 'configs';

    protected $fillable = ['id', 'data'];

    protected $casts = ['data' => 'array'];
}
