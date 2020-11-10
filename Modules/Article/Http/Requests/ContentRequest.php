<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Article\Entities\ArticleCategory;

class ContentRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return $this->formatData($this->model()->systemFields, 'rules') +
      $this->formatData($this->model()->fields, 'rules', '', 'field.');
  }

  public function attributes()
  {
    return $this->formatData($this->model()->systemFields, 'title') + $this->formatData($this->model()->fields, 'title', '', 'field.');
  }


  public function messages()
  {
    return $this->formatData($this->model()->systemFields, 'errors', '.regex') +
      $this->formatData($this->model()->systemFields, 'errors', '.regex', 'field.');
  }

  protected function formatData($fields, $name, $ext = '', $pre = '')
  {
    $data = [];
    foreach ($fields as $field) {
      if (!empty($field[$name]))
        $data[$pre . $field['name'] . $ext] = $field[$name];
    }
    return $data;
  }

  protected function model()
  {
    return ArticleCategory::find(request()->category_id)->model;
  }
}
