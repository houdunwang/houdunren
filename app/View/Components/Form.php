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

  public function __construct($theme = 'input', $name, $title = '', $value = '', $type = 'text', $options = [])
  {
    $this->theme = $theme;
    $this->type = $type;
    $this->name = $name;
    $this->title = $title;
    $this->value = $value;
    $this->options = $options;
  }

  public function render()
  {
    return view('components.form.' . $this->theme);
  }
}
