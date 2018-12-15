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

use App\Foundations\CommonRelation;
use App\Observers\CommentObserver;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 评论
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{
    use LogsActivity, CommonRelation;

    protected $fillable = ['content', 'user_id', 'url', 'description'];

    protected static $logFillable = true;

    protected static $logName = 'comment';

    //动态
    public $activity = [ 'action' => '发表了'];

    //获得拥有此评论的模型
    public function belongModel()
    {
        return $this->morphTo('comment');
    }

    public function link()
    {
        return $this['url'] . '#comment-' . $this['id'];
    }

    public function title()
    {
        return '[评论] ' . $this['description'];
    }
}
