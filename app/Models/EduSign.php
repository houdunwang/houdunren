<?php

namespace App\Models;

use App\Foundations\CommonRelation;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EduSign extends Model
{
    use CommonRelation, LogsActivity;

    protected $fillable = ['content', 'mood', 'user_id'];

    //全站动态
    protected static $logName = 'edu_sign';

    public $activity = ['create' => '完成签到','update' => '完成签到'];

    public function info()
    {
        return $this->hasOne(EduSignTotal::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link()
    {
        return route('edu.sign.create');
    }

    public function title()
    {
        return $this['content'];
    }
}
