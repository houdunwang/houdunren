<?php

namespace App\View\Components\Article;

use App\Models\ArticleCategory;
use App\Models\ArticleField;
use Illuminate\View\Component;

class Field extends Component
{
  public $category;

  public function __construct(ArticleCategory $category)
  {
    $this->category = $category;
  }

  public function name(ArticleField $field)
  {
    return 'fields[' . $field['name'] . ']';
  }

  public function options($options)
  {
    if (is_array($options)) return $options;

    $data = [];
    foreach (explode(',', $options) as $opt) {
      $info = explode(':', $opt);
      $data[$info[0]] = $info[1];
    }
    return $data;
  }

  public function render()
  {
    return view('components.article.field');
  }
}
