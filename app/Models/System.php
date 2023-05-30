<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class System extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['title', 'preview', 'description', 'order', 'lesson_num', 'video_num', 'view_num', 'download_address', 'type'];

    protected $hidden = ['download_address'];

    protected static $recordEvents = ['created'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => $this->title);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
