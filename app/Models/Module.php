<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'system', 'title', 'permission'];
    protected $casts = [
        'permission' => 'array',
    ];
}
