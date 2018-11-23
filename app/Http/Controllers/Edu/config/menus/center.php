<?php
return [
    ['name' => '帖子管理', 'route' => route('edu.topic.manage')],
    ['name' => '文档管理', 'route' => route('edu.document.manage')],
    ['name' => '会员时长', 'route' => route('edu.subscribe.show')],
    ['name' => '直播开关', 'route' => route('edu.live'), 'permission' => 'Edu-live'],
];