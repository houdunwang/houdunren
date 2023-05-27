<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use GrahamCampbell\Markdown\Facades\Markdown;

class Topic extends BaseModel
{
    use HasFactory, LogsActivity;

    protected $table = 'topics';

    protected $fillable = ['title', 'content'];

    protected $with = ['user'];

    protected static $recordEvents = ['created'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => $this->title);
    }

    public function getHtmlAttribute()
    {
        return Markdown::convert($this->content)->getContent();
    }
}
