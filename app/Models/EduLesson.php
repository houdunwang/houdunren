<?php
namespace App\Models;

use App\Models\Foundations\CommonRelation;
use App\Observers\EduLessonObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 视频课程
 * Class EduLesson
 * @package App\Models
 */
class EduLesson extends Model
{
    use CommonRelation, LogsActivity, Searchable;
    protected static $logName = 'edu_lesson';
    protected $fillable = [
        'id',
        'title',
        'description',
        'thumb',
        'type',
        'free',
        'subscribe_free_play',
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

    protected static function boot()
    {
        EduLesson::observe(EduLessonObserver::class);
        parent::boot();
    }

    //配置algolia可搜索属性
    public function toSearchableArray()
    {
        return [
            'title' => $this['title'],
            'description' => $this['description'],
        ];
    }

    public function video()
    {
        return $this->hasMany(EduVideo::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function title()
    {
        return $this->title;
    }

    public function link(string $param = '')
    {
        return route('edu.lesson.show', $this) . $param;
    }
}
