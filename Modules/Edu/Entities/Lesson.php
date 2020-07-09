<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Tag;

class Lesson extends Model
{
    protected $table = 'edu_lessons';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
