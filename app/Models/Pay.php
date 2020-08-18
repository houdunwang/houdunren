<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = ['site_id', 'module_id', 'user_id', 'price', 'subject', 'sn', 'type', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];
}
