<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Editor extends Component
{
  public $theme;
  public $name;
  public $value;
  public $height;
  public $type;
  public $action;

  /**
   * 初始参数
   * @param string $theme 编辑器类型
   * @param mixed $name 表单名称
   * @param string $value 默认值
   * @return void
   */
  public function __construct($theme = 'wang', $name, $value = '', $height = 300, $type = 'markdown', $action = null)
  {
    $this->theme = $theme;
    $this->name = $name;
    $this->value = $value;
    $this->height = $height;
    $this->type = $type;
    $this->action = $action ?? route('common.upload.make');
  }

  public function validateName($name)
  {
    return str_replace(['[', ']'], ['.', ''], $name);
  }

  public function render()
  {
    return view('components.editor.' . $this->theme);
  }
}
