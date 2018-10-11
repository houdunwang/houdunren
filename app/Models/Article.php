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

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Common, LogsActivity, Searchable;
    protected $fillable = ['title', 'content'];
    protected static $logFillable = true;
    protected static $recordEvents = ['created', 'updated'];
    protected static $logName = 'article';

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.article.show', $this) . $param;
    }

    public function getMarkdownAttribute()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text($this['content']);
    }
}
