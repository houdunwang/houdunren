<?php

namespace App\Models;

use Houdunwang\Arr\Arr;

/**
 * 栏目模型
 * @package App\Models
 */
class ArticleCategory extends BaseModel
{
  protected $fillable = ['site_id', 'model_id', 'pid', 'user_id', 'title', 'type', 'thumb', 'description', 'url', 'template_index', 'template_list', 'template_content'];

  protected $casts = [];

  protected $categoryTypes = ['list' => '普通栏目', 'index' => '封面栏目'];

  public function model()
  {
    return $this->belongsTo(ArticleModel::class, 'model_id');
  }

  public function getTypeTitleAttribute()
  {
    return $this->categoryTypes[$this['type']];
  }

  public static function allCategory(?ArticleCategory $currentCategory = null)
  {
    $categories = self::with('model')->get();
    $data = (new Arr())->tree($categories, 'title', 'id', 'pid');

    $data->map(function ($c) use ($currentCategory, $categories) {
      $c['disabled'] = $c['selected'] = false;

      if ($currentCategory) {
        $isChild = (new Arr)->isChild($categories, $c['id'], $currentCategory['id'], 'id', 'pid');
        $c['disabled'] = $currentCategory['id'] == $c['id'] || $isChild;
        $c['selected'] = $currentCategory['pid'] == $c['id'];
      }
    });

    return $data;
  }
}
