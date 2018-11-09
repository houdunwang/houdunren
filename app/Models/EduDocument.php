<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 手册文档
 * Class EduDocument
 * @package App\Models
 */
class EduDocument extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->hasMany(EduChapter::class, 'document_id', 'id');
    }
}
