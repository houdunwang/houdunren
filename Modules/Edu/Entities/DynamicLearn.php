<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\User;

class DynamicLearn extends Model
{
    protected $table = "edu_user_video";

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
