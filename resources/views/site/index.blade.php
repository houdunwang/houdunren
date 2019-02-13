@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i></li>
        <li><a href="#">首页</a></li>
        <li>网站列表</li>
    </ol>
    {{--@if (auth()->user()->isSuperAdmin())--}}
        {{--<div class="alert alert-success">--}}
            {{--温馨提示：--}}
            {{--<i class="fa fa-info-circle"></i>--}}
            {{--Hi，<span class="text-strong">{{auth()->user()['name']}}</span> 您是系统超级管理员不受任何功能限制。--}}
        {{--</div>--}}
    {{--@endif--}}
    <div class="clearfix">
        <div class="input-group">
            <a href="{{route('site.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> 添加网站</a>
        </div>
    </div>
    <br>
    @foreach($sites as $site)
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="col-xs-6" style="position: relative">
                    <span>套餐:</span>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="?s=site/entry/home&siteid=11" class="text-info">
                        <strong><i class="fa fa-cog"></i> 管理站点</strong>
                    </a>
                </div>
            </div>
            <div class="panel-body clearfix" style="padding:8px 15px;">
                <div class="col-xs-4 col-md-1">
                    <i class="fa fa-rss fa-4x"></i>

                </div>
                <div class="col-xs-4 col-md-5">
                    <h4 style="line-height:35px;overflow: hidden;height:30px;">
                        后盾网</h4>
                </div>
                <div class="col-xs-4 col-md-6 text-right"
                     style="line-height:60px;height:45px;">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                       title="接入状态: 接入成功">
                        <i class="fa fa-check-circle fa-2x text-success"></i>
                    </a>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <div class="col-md-6">
                    服务有效期 : 2017-04-09 ~ 2022-12-16&nbsp;&nbsp;&nbsp;站长 : hdxj (后盾人官方)
                </div>
                <div class="col-md-6 text-right">
                    <a href="?s=system/site/access_setting&siteid=11">
                        <i class="fa fa-key"></i> 设置权限
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="?s=system/site/wechat&step=wechat&siteid=11">
                        <i class="fa fa-comment-o"></i> 微信公众号
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="?s=system/permission/users&siteid=11">
                        <i class="fa fa-user"></i>操作员管理
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:;"
                       onclick="delSite(11,'后盾网')">
                        <i class="fa fa-trash"></i> 删除
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="?s=system/site/edit&siteid=11">
                        <i class="fa fa-pencil-square-o"></i> 编辑
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除站点吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush