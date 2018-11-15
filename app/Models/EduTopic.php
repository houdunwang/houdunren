<?php
namespace App\Models;

use App\Foundations\CommonRelation;
use App\Observers\EduTopicObserver;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 话题
 * Class EduTopic
 * @package App\Models
 */
class EduTopic extends Model
{
    use CommonRelation, LogsActivity, Searchable;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    protected static $logName = 'edu_topic';

    protected static $recordEvents = ['created', 'updated'];

    protected static $logAttributes = ['title', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(EduCategory::class);
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public function link($param = '')
    {
        return route('edu.topic.show', $this) . $param;
    }

    public function title()
    {
        return $this['title'];
    }

    //配置algolia可搜索属性
    public function toSearchableArray()
    {
        return [
            'title' => $this['title'],
            'content' => mb_substr($this['content'], 0, 300, 'utf8'),
        ];
    }

    /**
     * 根据会员编号获取贴子
     * @param $query
     * @param int $user_id
     * @return mixed
     */
    public function scopeByUserId($query, int $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
