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
            <span class="text-secondary">将以下链接链接填入对应输入框</span>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right">URL</label>
                <div class="col-sm-10">
                    <a href="javascript:void(0);" class="form-control-plaintext text-primary copy"
                       data-clipboard-text="{{route('api.chat',[$site,$chat])}}">
                        {{route('api.chat',[$site,$chat])}}
                    </a>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Token</label>
                <div class="col-sm-10">
                    <a href="javascript:void(0);" readonly class="form-control-plaintext text-primary copy"
                       data-clipboard-text="{{$chat['token']}}">
                        {{$chat['token']}}
                    </a>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right">EncodingAESKey</label>
                <div class="col-sm-10">
                    <a href="javascript:void(0);" readonly class="form-control-plaintext text-primary copy"
                       data-clipboard-text="{{$chat['encodingaeskey']}}">
                        {{$chat['encodingaeskey']}}
                    </a>
                </div>
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
    <div class="alert alert-success mt-3">
        配置好微信后， 发送关键词 <strong>hdcms</strong> 检查配置状态吧
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{route('site.chat.edit',[$site,$chat])}}">
            继续编辑公众号资料
        </a>
        <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
            删除公众号
        </button>
        <form action="{{route('site.chat.destroy',[$site,$chat])}}" method="post">
            @csrf @method('DELETE')
        </form>
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