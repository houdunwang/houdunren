<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//文档章节
class EduChapter extends Model
{
    protected $fillable = [ 'title', 'document_id'];

    public function document()
    {
        return $this->belongsTo(EduDocument::class);
    }

    public function section(){
        return $this->hasMany(EduSection::class,'chapter_id','id');
    }
}
