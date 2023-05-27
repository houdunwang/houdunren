<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Sign extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'signs';

    protected $fillable = ['content', 'mood'];

    protected $with = ['signCount', 'user'];

    protected static $recordEvents = ['created'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => $this->content);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signCount()
    {
        return $this->hasOne(SignCount::class, 'user_id', 'user_id');
    }
}
