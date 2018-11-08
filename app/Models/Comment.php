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
use App\Observers\CommentObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

//评论
class Comment extends Model
{
    use LogsActivity, Common;

    protected $fillable = ['content', 'user_id', 'url'];

    protected static $logFillable = true;
    protected static $recordEvents = ['created', 'updated'];
    protected static $logName = 'comment';

    protected static function boot()
    {
        self::observe(CommentObserver::class);
        parent::boot();
    }

    //获得拥有此评论的模型
    public function belongModel()
    {
        return $this->morphTo('comment');
    }

    public function link()
    {
        return $this->belongModel->link('#comment-' . $this['id']);
    }

    public function title()
    {
        return $this->description ?? mb_substr(strip_tags((new \Parsedown())->text($this['content'])), 0, 50);
    }
}
