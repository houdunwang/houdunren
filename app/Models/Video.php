<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends BaseModel
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = ['title', 'path', 'order', 'lesson_id', 'id'];

    protected $hidden = ['path'];

    protected $with = ['lesson'];

    public function scopeByKeyword($query, $type)
    {
        $query->where('title', 'like', "%{$type}%");
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    //视频学习记录
    public function playHistory()
    {
        return $this->hasMany(VideoPlayHistory::class);
    }
}
