<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'title', 'path', 'duration'];
    protected $casts = [];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
