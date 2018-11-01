<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EduSection extends Model
{
    protected $fillable = ['title','content','chapter_id'];

    public function chapter(){
    	return $this->belongsTo(EduChapter::class,'chapter_id','id');
	}
}
