<?php

namespace Modules\Edu\Entities;

use App\Models\Site;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Favorite, Favour;

    protected $table = 'edu_videos';

    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function getNextAttribute()
    {
        $videos = $this->lesson->videos;
        foreach ($videos as $i => $video) {
            if ($video['id'] == $this['id']) {
                return isset($videos[$i + 1]) ? $videos[$i + 1] : null;
            }
        }
    }

    public function getPrevAttribute()
    {
        $videos = $this->lesson->videos;
        foreach ($videos as $i => $video) {
            if ($video['id'] == $this['id']) {
                return isset($videos[$i - 1]) ? $videos[$i - 1] : null;
            }
        }
    }

    public function getIndexAttribute()
    {
        foreach ($this->lesson->videos as $i => $video) {
            if ($video['id'] == $this['id']) {
                return $i;
            }
        }
    }
}
