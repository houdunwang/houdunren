<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模型字段
 * @package App\Models
 */
class ArticleField extends Model
{
  protected $fillable = ['title', 'required', 'name', 'type', 'placeholder', 'options', 'site_id', 'model_id', 'value', 'rules', 'errors', 'show', 'ext'];

  protected $casts = [
    'required' => 'boolean',
    'show' => 'boolean',
    'ext' => 'json'
  ];

  public function model()
  {
    return $this->belongsTo(ArticleField::class, 'model_id');
  }

  public function formatOptions()
  {
    if (is_array($this->options)) return $this->options;

    $data = [];
    foreach (explode(',', $this->options) as $opt) {
      $info = explode(':', $opt);
      if (count($info) == 2)
        $data[$info[0]] = $info[1];
    }
    return $data;
  }
}
