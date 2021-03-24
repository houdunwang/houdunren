<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统课程
 * @package Modules\Edu\Entities
 */
class System extends Model
{
    protected $table = 'edu_system';

    protected $fillable = ['title', 'description', 'preview', 'site_id', 'user_id'];

    /**
     * 课程关联
     *
     * @return void
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'edu_system_lesson')->orderBy('rank', 'asc');
    }
}
