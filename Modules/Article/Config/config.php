<?php
return [
    'name' => 'Article',
    'title' => '文章系统',
    'description' => '多栏目文章系统',
    'version' => 'v1.0.0',
    'author' => '向军老师',
    'icon' => 'fas fa-futbol',
    'front' => true,
    'wechat' => [
        'subscribe' => [
            'isTextMessage',
            'isSubscribeEvent',
            'isScanEvent',
            'isImageMessage',
            'isButtonPicSysPhoto'
        ]
    ]
];
