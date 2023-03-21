<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity as ModelsActivity;

class Activity extends ModelsActivity
{
    use HasFactory;

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
