<?php

namespace App\Models;

use App\Foundations\CommonRelation;
use App\Observers\ZanObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 点赞
 * Class Zan
 * @package App\Models
 */
class Zan extends Model
{
    use CommonRelation, LogsActivity;

    protected static $logAttributes = ['created_at', 'updated_at'];
    protected static $recordEvents = ['created'];
    protected static $logName = 'zan';
    protected $fillable = ['user_id', 'url','title'];

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
