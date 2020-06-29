<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    protected $theme;

    public function __construct($theme = 'input')
    {
        $this->theme = $theme;
    }

    public function render()
    {
        return view('components.' . $this->theme);
    }
}
