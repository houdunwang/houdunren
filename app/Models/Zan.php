<?php

namespace App\Models;

use App\Foundations\CommonRelation;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 点赞
 * Class Zan
 * @package App\Models
 */
class Zan extends Model
{
    use CommonRelation, LogsActivity, SoftDeletes;

    //软删除
    protected $dates = ['deleted_at'];

    //全站动态
    protected static $logName = 'zan';
    public $activity = ['action' => '点赞了'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function belongModel()
    {
        return $this->morphTo('zan');
    }

    //赞标题
    public function title()
    {
        return $this['title'];
    }

    //链接
    public function link()
    {
        return $this['url'];
    }
}
