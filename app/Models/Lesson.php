<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Lesson extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'lessons';

    protected $fillable = ['title', 'description', 'preview', 'video', 'price', 'system_id', 'download_address',  'video_num', 'view_num', 'favorite_count'];

    protected static $recordEvents = ['created'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => $this->title);
    }

    public function favours()
    {
        return $this->morphToMany(User::class, 'favour', 'favours')->withTimestamps();
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite')->withTimestamps();
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }
}
