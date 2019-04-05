<?php

namespace App\Models;

use App\Traits\ActivityRecord;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 点赞管理
 * Class Favour
 * @package App\Models
 */
class Favour extends Model
{
    use LogsActivity, ActivityRecord;

    protected static $logName = 'favour';
    protected static $recordEvents = ['created'];
    protected $fillable = ['site_id', 'user_id', 'module_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function belongModel()
    {
        return $this->morphTo('favour');
    }

    public function getTitle()
    {
        return $this->belongModel->getTitle();
    }

    public function getLink()
    {
        return $this->belongModel->getLink();
    }
}
