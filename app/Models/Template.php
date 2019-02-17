<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'title',
        'name',
        'package',
        'local',
    ];
    protected $casts = [
        'package' => 'array',
        'local' => 'boolean',
    ];
}
