<?php

namespace App\Models;

use App\Models\Traits\Common;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Common;
    protected $fillable = ['title', 'content'];

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.article.show', $this) . $param;
    }
}
