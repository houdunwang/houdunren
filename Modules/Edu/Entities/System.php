<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'edu_system';

    protected $fillable = ['title', 'description', 'preview'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'edu_system_lesson')->orderBy('rank', 'asc');
    }
}
