<?php

namespace App\Models;

use App\Models\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Topic extends Model
{
    use Common, Searchable;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.article.show', $this) . $param;
    }
}
