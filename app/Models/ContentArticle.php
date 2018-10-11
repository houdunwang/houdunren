<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ContentArticle extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'source',
        'author',
        'thumb',
        'description',
        'content',
        'redirect_url',
        'click',
        'template',
        'fields',
    ];

    protected $casts = ['fields' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ContentCategory::class);
    }

    public function extendField(ContentCategory $category)
    {
        $html = '';
        foreach ($category->model->fields as $field) {
            $html .= view('content.fields.' . $field['type'],
                ['field' => $field, 'article' => isset($this['id']) ? $this['fields'] : []]);
        }
        return $html;
    }
}
