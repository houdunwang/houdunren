<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章章
 * Class EduSection
 * @package App\Models
 */
class EduSection extends Model
{
    protected $fillable = ['title', 'content', 'chapter_id'];

    public function chapter()
    {
        return $this->belongsTo(EduChapter::class, 'chapter_id', 'id');
    }
}
