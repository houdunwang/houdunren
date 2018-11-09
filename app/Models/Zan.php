<?php

namespace App\Models;

use App\Models\Foundations\CommonRelation;
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
    protected static $logName = 'edu_zan';
    protected $fillable = ['user_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        Zan::observe(ZanObserver::class);
        parent::boot();
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
        return $this->belongModel->title();
    }

    //链接
    public function link()
    {
        switch (class_basename($this->belongModel)) {
            case 'EduTopic':
                return $this->belongModel->link();
            case 'Comment':
                $param = '#comment-' . $this->belongModel->id;
                return $this->belongModel->belongModel->link($param);
        }
    }
}
