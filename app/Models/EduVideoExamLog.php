<?php

namespace App\Models;

use App\Foundations\CommonRelation;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EduVideoExamLog extends Model
{
    use CommonRelation, LogsActivity;

    protected static $logName = 'edu_video_exam_log';

    protected $fillable = ['grade', 'user_id', 'video_id'];

    //全站动态
    protected static $recordEvents = ['created'];
    public $activity = ['create' => '参加了', 'update' => '参加了'];

    public function video()
    {
        return $this->belongsTo(EduVideo::class, 'video_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function link()
    {
        return route('edu.video.question.video.show', $this['video']);
    }

    public function title()
    {
        return $this['video']['title'] . '的考试，得到了' . $this['grade'] . '分';
    }
}
