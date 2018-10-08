<?php

namespace App\Models;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    protected $fillable = ['title', 'model_id', 'parent_id', 'is_homepage', 'description', 'redirect_url', 'index_template', 'category_template', 'content_template'];

    public function model()
    {
        return $this->belongsTo(ContentModel::class);
    }

    public function article()
    {
        return $this->hasMany(ContentArticle::class);
    }

    public static function getAllCategory()
    {
        return Arr::tree(self::get()->toArray(), 'title', 'id',  'parent_id');
    }
}
