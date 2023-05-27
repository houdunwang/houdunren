<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $table = 'systems';

    protected $fillable = ['title', 'preview', 'description', 'order', 'lesson_num', 'video_num', 'view_num', 'download_address', 'type'];

    protected $hidden = ['download_address'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
