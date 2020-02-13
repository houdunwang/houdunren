<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleConfig extends Model
{
    //
    protected $guarded = [];
    protected $casts = ['config' => 'array'];
}