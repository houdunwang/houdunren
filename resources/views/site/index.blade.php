@extends('layouts.admin')
@section('content')

    <div class="clearfix">
        <div class="input-group">
            <a href="{{route('site.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> 添加网站
            </a>
        </div>
    </div>
    <br>
    @foreach($sites as $site)
        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <span>套餐:</span>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('site.show',$site)}}" class="text-muted">
                            <strong><i class="fa fa-cog"></i> 管理站点</strong>
                        </a>
                </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-4 col-md-1">
                        <i class="fa fa-rss fa-4x"></i>
                    </div>
                    <div class="col-xs-4 col-md-5">
                        <h4>{{$site['name']}}</h4>
                    </div>
                    <div class="col-xs-4 col-md-6 text-right">
                        <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="接入状态: 接入成功">
                            <i class="fa fa-check-circle fa-2x text-info"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-6">
                        服务有效期 : 2017-04-09 ~ 2022-12-16&nbsp;&nbsp;&nbsp;站长 : hdxj (后盾人官方)
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="?s=system/site/access_setting&siteid=11" class="text-muted">
                            <i class="fa fa-key"></i> 设置权限
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="?s=system/site/wechat&step=wechat&siteid=11" class="text-muted">
                            <i class="fa fa-comment-o"></i> 微信公众号
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="?s=system/permission/users&siteid=11" class="text-muted">
                            <i class="fa fa-user"></i> 操作员管理
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" onclick="delSite(11,'后盾网')" class="text-muted">
                            <i class="fa fa-trash"></i> 删除
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="?s=system/site/edit&siteid=11" class="text-muted">
                            <i class="fa fa-pencil-square-o"></i> 编辑
                        </a>
                    </div>
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