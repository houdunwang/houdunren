<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//考试答题结果
class QuestionAnswer extends Model
{
    use HasFactory;
    protected $table = 'question_answers';

    protected $fillable = ['answers', 'answer', 'mark'];

    protected $casts = ['answers' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
