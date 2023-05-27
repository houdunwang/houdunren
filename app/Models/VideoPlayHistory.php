<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPlayHistory extends Model
{
    use HasFactory;
    protected $table = 'video_play_histories';

    protected $fillable = ['user_id', 'video_id', 'lesson_id'];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
