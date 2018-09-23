<?php

namespace App\Models;

use App\Models\Traits\Common;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use Common;
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'type',
        'free',
        'subscibe_play',
        'free_num',
        'price',
        'is_commend',
        'is_hot',
        'click',
        'times',
        'status',
        'download_address',
        'user_id',
    ];

    protected $casts = [];

    public function video()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.lesson.show', $this) . $param;
    }
}
