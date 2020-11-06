<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
  protected $theme;

  public $title;
  public $options;
  public $type;
  public $name;
  public $value;
  public $class;
  public $placeholder;
  public $required;
  public $readonly;
  public $disabled;
  public $hidden;

  public function __construct($theme = 'input', $name = '', $title = '', $value = '', $type = 'text', $options = [], $class = '', $placeholder = '', $required = false, $readonly = false, $disabled = false, $hidden = false)
  {
    $this->theme = $theme;
    $this->type = $type;
    $this->name = $name;
    $this->title = $title;
    $this->value = $value;
    $this->options = $options;
    $this->class = $class;
    $this->placeholder = $placeholder;
    $this->required = $required ? ' required ' : '';
    $this->readonly = $readonly ? ' readonly ' : '';
    $this->disabled = $disabled ? ' disabled ' : '';
    $this->hidden = $hidden ? ' hidden ' : '';
  }

  public function render()
  {
    return view('components.form.' . $this->theme);
  }

  public function validateName($name)
  {
    return str_replace(['[', ']'], ['.', ''], $name);
  }
}
