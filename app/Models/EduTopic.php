<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models;

use App\Models\Traits\Common;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 帖子
 * Class EduTopic
 * @package App\Models
 */
class EduTopic extends Model
{
    use Common, LogsActivity, Searchable;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    protected static $logName = 'edu_topic';

    protected static $logAttributes = ['title', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(EduCategory::class);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public function link($param)
    {
        return route('edu.topic.show', $this) . $param;
    }

    //配置algolia可搜索属性
    public function toSearchableArray()
    {
        return [
            'title' => $this['title'],
            'content' => mb_substr($this['content'], 0, 300, 'utf8'),
        ];
    }
}
