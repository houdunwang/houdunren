<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 后台菜单配置
 * 下面是属性说明：
 * title 菜单栏目
 * icon 图标参考 http://fontawesome.dashgame.com/
 * menus 子菜单
 */
return [
    [
        "title"      => "系统管理",
        "icon"       => "fa fa-cubes",
        "permission" => "",
        "menus"      => [
            ["title" => "网站配置", "permission" => "Admin::site config", "url" => "链接地址"],
            ["title" => "微信设置", "permission" => "Admin::wechat setting", "url" => "链接地址"],
            ["title" => "权限管理", "permission" => "Admin::permission manage", "url" => "/admin/role"],
        ],
    ]
];
