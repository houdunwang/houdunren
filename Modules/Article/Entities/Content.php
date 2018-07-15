<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','description','author','content','thumb','click','istop','city','category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
