<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['title', 'name', 'status', 'unit'];

    protected $casts = [
        'status' => 'int',
    ];
}
