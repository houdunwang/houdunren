<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员周期
 * @package Modules\Edu\Entities
 */
class Duration extends Model
{
    protected $table = "edu_duration";

    protected $fillable = ['begin_time', 'end_time', 'user_id', 'site_id'];

    protected $casts = [
        'begin_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
