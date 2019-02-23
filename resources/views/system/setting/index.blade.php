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
    </div>
    <h5 class="page-header">应用扩展</h5>
    <div class="clearfix">
        <a href="{{route('system.module.index')}}" class="tile img-rounded">
            <i class="fa fa-cubes"></i> <span>模块</span>
        </a>
        <a href="?s=system/template/installed" class="tile img-rounded">
            <i class="fa fa-file-code-o"></i> <span>模板</span>
        </a>
    </div>
    <h5 class="page-header">用户管理</h5>
    <div class="clearfix">
        <a href="{{route('system.user.edit',auth()->user())}}" class="tile img-rounded">
            <i class="fa fa-briefcase"></i> <span>我的帐户</span>
        </a>
        <a href="{{route('system.user.index')}}" class="tile img-rounded">
            <i class="fa fa-user"></i> <span>用户管理</span>
        </a>
        <a href="{{route('system.group.index')}}" class="tile img-rounded">
            <i class="fa fa-users"></i> <span>用户组管理</span>
        </a>
        <a href="{{route('system.package.index')}}" class="tile img-rounded">
            <i class="fa fa-comments-o"></i> <span>服务套餐</span>
        </a>
    </div>
    <h5 class="page-header">系统管理</h5>
    <div class="clearfix">
        <a href="{{route('site.site.index')}}" class="tile img-rounded">
            <i class="fa fa-sitemap"></i> <span>站点列表</span>
        </a>
        <a href="{{route('system.setting.edit','base')}}" class="tile img-rounded">
            <i class="fa fa-tachometer"></i> <span>系统配置</span>
        </a>
        <a href="{{route('system.update-cache')}}" class="tile img-rounded">
            <i class="fa fa-refresh"></i> <span>更新缓存</span>
        </a>
    </div>
@stop