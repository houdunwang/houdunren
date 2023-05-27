<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortVideo extends Model
{
    use HasFactory;
    protected $table = 'short_videos';

    protected $fillable = ['title', 'path', 'preview'];

    protected $hidden = ['path'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
