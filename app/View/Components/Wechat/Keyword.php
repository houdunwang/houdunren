<?php

namespace App\View\Components\Wechat;

use App\Models\WeChatRule;
use Illuminate\View\Component;

class Keyword extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('components.wechat.keyword');
    }
}
