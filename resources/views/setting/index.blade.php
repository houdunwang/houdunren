@extends('layouts.admin')
@section('content')
        <h5 class="page-header">云服务</h5>
        <div class="clearfix">
            <a href="http://www.houdunwang.com?s=system/cloud/upgrade" class="tile img-rounded">
                <i class="fa fa-cloud-download"></i>
                <span>一键更新</span>
            </a>
            <a href="http://www.houdunwang.com?s=system/cloud/account" class="tile img-rounded">
                <i class="fa fa-globe"></i>
                <span>云帐号</span>
            </a>
            <a href="?s=system/shop/lists&amp;type=module" class="tile img-rounded">
                <i class="fa fa-shopping-bag"></i>
                <span>模块商店</span>
            </a>
            <a href="?s=system/shop/lists&amp;type=template" class="tile img-rounded">
                <i class="fa fa-shopping-cart"></i>
                <span>风格商店</span>
            </a>
        </div>
        <h5 class="page-header">扩展</h5>
        <div class="clearfix">
            <a href="?s=system/module/installed" class="tile img-rounded">
                <i class="fa fa-cubes"></i>
                <span>模块</span>
            </a>
            <a href="?s=system/template/installed" class="tile img-rounded">
                <i class="fa fa-file-code-o"></i>
                <span>模板</span>
            </a>
        </div>
        <h5 class="page-header">用户管理</h5>
        <div class="clearfix">
            <a href="?s=system/user/info" class="tile img-rounded">
                <i class="fa fa-briefcase"></i>
                <span>我的帐户</span>
            </a>
            <a href="http://www.houdunwang.com?s=system/user/lists" class="tile img-rounded">
                <i class="fa fa-user"></i>
                <span>用户管理</span>
            </a>
            <a href="http://www.houdunwang.com?s=system/group/lists" class="tile img-rounded">
                <i class="fa fa-users"></i>
                <span>用户组管理</span>
            </a>
            <a href="http://www.houdunwang.com?s=system/config/register" class="tile img-rounded">
                <i class="fa fa-soccer-ball-o"></i>
                <span>注册设置</span>
            </a>
        </div>

        <h5 class="page-header">站点管理</h5>
        <div class="clearfix">
            <a href="{{route('site.index')}}" class="tile img-rounded">
                <i class="fa fa-sitemap"></i>
                <span>站点列表</span>
            </a>
            <a href="?s=system/package/lists" class="tile img-rounded">
                <i class="fa fa-comments-o"></i>
                <span>服务套餐</span>
            </a>
            <a href="{{route('setting.edit','base')}}" class="tile img-rounded">
                <i class="fa fa-tachometer"></i>
                <span>系统配置</span>
            </a>
        </div>

        <h5 class="page-header">系统管理</h5>
        <div class="clearfix">
            <a href="http://www.houdunwang.com?s=system/menu/edit" class="tile img-rounded">
                <i class="fa fa-list"></i>
                <span>系统菜单</span>
            </a>
            <a href="?s=system/manage/updateCache" class="tile img-rounded">
                <i class="fa fa-refresh"></i>
                <span>更新缓存</span>
            </a>
        </div>
@stop