<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'edu_order';

    protected $fillable = ['lesson_id', 'site_id', 'user_id', 'price', 'subject', 'sn', 'type', 'month', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];
}
