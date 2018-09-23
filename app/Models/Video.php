<?php

namespace App\Models;

use App\Models\Traits\Common;
use App\Observers\VideoObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

class Video extends Model
{
    use SoftDeletes, Common;
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'title', 'path', 'duration'];
    protected $casts = [];

    protected static function boot()
    {
        self::observe(VideoObserver::class);
        parent::boot();
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.video.show', $this) . $param;
    }
}
