<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories\Traits;

trait ModuleTrait
{
    //配置项
    protected $package = [
        //模块中文名称
        'title' => '',
        //模块标识
        'name' => '',
        //预览图
        'thumb' => '',
        //模块配置
        'config' => false,
        //域名管理
        'domain' => false,
        //微信回复列表
        'wx_replies' => false,
        //微信封面入口
        'wx_cover' => false,
        //桌面会员中心菜单
        'menu_web' => false,
        //手机会员中心菜单
        'menu_mobile' => false,
        //微信订阅消息处理
        'subscribe' => false,
        //直接处理微信消息
        'processor' => false,
    ];
    //权限配置
    protected $permissions = [
        ['title' => '用户管理', 'name' => 'user-manage'],
    ];
    //会员菜单
    protected $menus = [
//        //桌面首页菜单
//        'home_pc' => [
//            ['title' => '官网首页菜单', 'url' => 'http://www.hdcms.com'],
//        ],
        //桌面会员中心菜单
        'member_pc' => [
            ['title' => '会员中心菜单pc', 'url' => 'http://www.hdcms.com','permission' => ''],
        ],
        //移动端会员中心菜单
        'member_mobile' => [
            ['title' => '会员中心菜单mobile', 'url' => 'http://www.houdunren.com','permission' => ''],
        ],
//        //桌面个人空间菜单
//        'space_pc' => [
//            ['title' => '个人空间菜单pc', 'url' => 'http://www.hdcms.com'],
//        ],
//        //移动端个人空间菜单
//        'space_mobile' => [
//            ['title' => '个人空间菜单mobile', 'url' => 'http://www.houdunren.com'],
//        ],
    ];
    //业务菜单
    protected $business = [
        '业务管理' => [
            ['title' => '用户管理', 'url' => '/', 'permission' => 'user-manage'],
        ],
    ];

    public function modulePath(string $name = null): string
    {
        return base_path('Modules') . DIRECTORY_SEPARATOR . ($name ?? $this->package['name']) . DIRECTORY_SEPARATOR;
    }

    public function configPath(string $name = null): string
    {
        return base_path('Modules') . DIRECTORY_SEPARATOR . ($name ?? $this->package['name']) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR;
    }
}