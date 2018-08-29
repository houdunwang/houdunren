<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/6/30 上午1:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
return [
    //上传事件监听器
    'listener'     => function () {
        return \Houdunwang\LaravelUpload\Listeners\FileListener::class;
    },

    //图片大小
    'image_size'   => 500000,

    //图片宽度
    'image_with'   => 800,

    //图片允许高度
    'image_height' => 800,

    //允许图片类型
    'image_type'   => 'jpg,jpeg,gif,png',

    //允许文件大小
    'file_size'    => 2000000,

    //允许文件类型
    'file_type'    => 'zip,rar,doc,txt,pem,json',
];
