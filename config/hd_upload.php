<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/6/30 上午1:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
return [
    //上传事件监听器
    'listener' => function () {
        return \Houdunwang\LaravelUpload\Listeners\FileListener::class;
    },
];
