@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.module.update',$module)}}" method="post">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.module.index')}}"> 模块列表</a>
                    </li>
                </ul>
                @csrf @method('PUT')
                <div class="form-group">
                    <label>模块名称</label>
                    <input type="text" value="{{old('title',$module['title'])}}" class="form-control text-secondary"
                           disabled="disabled">
                </div>
                <div class="form-group">
                    <label>模块标识</label>
                    <input type="text" value="{{old('name',$module['name'])}}" class="form-control  text-secondary"
                           disabled>
                </div>
                <div class="form-group">
                    <label>访问域名</label>
                    <input type="text" name="domain" value="{{old('domain',$module['domain'])}}"
                           class="form-control" placeholder="如：www.houdunren.com">
                    <small id="helpId" class="text-muted">
                        设置域名后可直接访问到模块的 HomeController@index 方法 , 域名不需要设置http://
                    </small>
                </div>
                <div class="card">
                    <div class="card-header">
                        会员中心菜单
                    </div>
                    <div class="card-body small">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="center_menu_setting" value="1"
                                   {{active_class($module['center_menu_setting']==1,'checked')}} id="center_menu_setting1">
                            <label class="form-check-label" for="center_menu_setting1">全站显示</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="center_menu_setting" value="2"
                                   {{active_class($module['center_menu_setting']==2,'checked')}} id="center_menu_setting2">
                            <label class="form-check-label" for="center_menu_setting2">本模块显示(需要配置域名)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="center_menu_setting" value="0"
                                   {{active_class($module['center_menu_setting']==0,'checked')}} id="center_menu_setting0">
                            <label class="form-check-label" for="center_menu_setting0">隐藏菜单</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        个人主页菜单
                    </div>
                    <div class="card-body small">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="space_menu_setting" value="1"
                                   {{active_class($module['space_menu_setting']==1,'checked')}} id="space_menu_setting1">
                            <label class="form-check-label" for="space_menu_setting1">全站显示</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="space_menu_setting" value="2"
                                   {{active_class($module['space_menu_setting']==2,'checked')}} id="space_menu_setting2">
                            <label class="form-check-label" for="space_menu_setting2">本模块显示(需要配置域名)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="space_menu_setting" value="0"
                                   {{active_class($module['space_menu_setting']==0,'checked')}} id="space_menu_setting0">
                            <label class="form-check-label" for="space_menu_setting0">隐藏菜单</label>
                        </div>
                    </div>
                </div>
            </div>
            <b4 class="card-footer">
               <button class="btn btn-primary btn-sm" type="submit">保存</button>
            </b4>
        </div>
    </form>
@endsection
