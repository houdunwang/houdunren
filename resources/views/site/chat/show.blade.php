@extends('layouts.admin')
@section('content')
    @include('site.chat._tabs')
    <div class="alert alert-info" role="alert">
        <strong>您绑定的微信公众号：<strong class="text-danger">{{$chat['name']}}</strong>，请按照下列引导完成配置。</strong>
    </div>

    <div class="card">
        <div class="card-header">
            登录 <a href="https://mp.weixin.qq.com/" target="_blank">微信公众平台</a>，点击左侧菜单最后一项，进入 [ 开发者中心 ]
        </div>
        <div class="card-body">
            <img src="{{asset('images/chat/Snip20160308_5.png')}}" alt="">
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            在开发者中心，找到［ 服务器配置 ］栏目下URL和Token设置
        </div>
        <div class="card-body">
            <img src="{{asset('images/chat/2.png')}}">
            <hr>
            <h6 class="text-dark">将以下链接链接填入对应输入框</h6>
            <div class="row mb-2">
                <span class="col-md-2">URL:</span>
                <a href="javascript:void(0);" class="col-md-8 text-primary copy"
                   data-clipboard-text="{{route('api.chat',[$site,$chat])}}">{{route('api.chat',[$site,$chat])}}</a>
            </div>
            <div class="row mb-2">
                <span class="col-md-2">Token:</span>
                <a href="javascript:void(0);" class="col-md-8 text-primary copy"
                   data-clipboard-text="{{$chat['token']}}">{{$chat['token']}}</a>
            </div>
            <div class="row mb-2">
                <span class="col-md-2">EncodingAESKey:</span>
                <a href="javascript:void(0);" class="col-md-8 text-primary copy"
                   data-clipboard-text="{{$chat['encodingaeskey']}}">{{$chat['encodingaeskey']}}</a>
            </div>
            @push('js')
                <script>
                    require(['hdjs'], function (hdjs) {
                        hdjs.clipboard('.copy', {}, function (e) {
                            hdjs.notify('复制成功');
                            e.clearSelection();
                        })
                    });
                </script>
            @endpush
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            公众号二维码
        </div>
        <div class="card-body">
            <img src="{{$chat['qr']}}" style="height: 100px;">
        </div>
        <div class="card-footer text-muted">
            配置好微信后， 发送关键词 <strong>hdcms</strong> 检查配置状态吧
        </div>
    </div>
    <div class="btn-group  mt-3" role="group" aria-label="Basic example">
        <a class="btn btn-success" href="{{route('site.chat.edit',[$site,$chat])}}">
            继续编辑公众号
        </a>

        <a class="btn btn-info" href="{{route('site.chat.index',[$site])}}">
            返回公众号列表
        </a>
        <form action="{{route('site.chat.destroy',[$site,$chat])}}" method="post">
            @csrf @method('DELETE')
        </form>
        <button type="button" class="btn btn-secondary" onclick="destroy(this)">
            删除公众号
        </button>
    </div>
@stop
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                $message = '确定删除 <strong class="text-danger">[{{$chat["name"]}}]</strong> 公众号吗？';
                hdjs.confirm($message, function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush