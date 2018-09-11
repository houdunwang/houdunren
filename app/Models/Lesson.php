<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
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
}
