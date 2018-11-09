<?php

namespace App\Models;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * 文章栏目
 * Class ContentCategory
 * @package App\Models
 */
class ContentCategory extends Model
{
    protected $fillable = [
        'title',
        'model_id',
        'parent_id',
        'is_homepage',
        'description',
        'redirect_url',
        'index_template',
        'category_template',
        'content_template',
    ];

    public function model()
    {
        return $this->belongsTo(ContentModel::class);
    }

    public function article()
    {
        return $this->hasMany(ContentArticle::class,'category_id');
    }

    public function tree(Collection $categories = null)
    {
        $categories = $categories ?? self::get();
        $data = Arr::category($categories, 0, 'title', 'id', 'parent_id');
        foreach ($data as $k => $v) {
            if ($this['id']) {
                $data[$k]['_disabled'] =
                    $v['id'] == $this['id']
                    || Arr::isChild($data, $v['id'], $this['id'], 'id', 'parent_id')  || $v['is_homepage'] ? 'disabled' : '';

                $data[$k]['_selected'] = $v['id'] == $this['parent_id'] ? 'selected' : '';
            }
        }
        return $data;
    }
}
