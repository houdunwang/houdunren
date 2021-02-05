<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $table = "edu_duration";

    protected $fillable = ['begin_time', 'end_time', 'user_id', 'site_id'];

    protected $casts = [
        'begin_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
