<?php
return [
    ['name' => '话题列表', 'route' => route('edu.space.topic',\Route::getCurrentRoute()->parameter('user')??1)],
    ['name' => '收藏课程', 'route' => route('edu.space.lesson',\Route::getCurrentRoute()->parameter('user')??1)],
];