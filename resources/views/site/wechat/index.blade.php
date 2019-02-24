@extends('layouts.admin')
@section('content')
    @include('site.wechat._tabs')

    <div class="card">
        <div class="card-header">
            微信公众号列表
        </div>
        <div class="card-body">
            @if (count($wechats)>0)
                @foreach($wechats as $wechat)
                    <div class="row">
                        <div class="col-xs-3 col-md-1 text-dark">
                            <img src="{{$wechat['icon']}}" class="img-thumbnail">
                        </div>
                        <div class="col-xs-3 col-md-1 text-dark">
                            <img src="{{$wechat['qr']}}" class="img-thumbnail">
                        </div>
                        <div class="col-xs-3 col-md-5 text-dark">
                            <strong class="title text-dark d-block">
                                {{$wechat['name']}}
                            </strong>
                            <small class="text-secondary pr-2">
                                类型: {{$wechat['genreTitle']}}
                            </small>
                            <small class="text-secondary">
                                微信号: {{$wechat['account']}}
                            </small>
                        </div>
                        <div class="col-xs-4 col-md-5 text-right mt-3">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{route('site.wechat.edit',[$site,$wechat])}}">
                                    编辑公众号资料
                                </a>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="destroy(this,'{{$wechat['name']}}')">
                                    删除公众号
                                </button>
                                <form action="{{route('site.wechat.destroy',[$site,$wechat])}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a class="btn btn-outline-info" href="{{route('site.wechat.show',[$site,$wechat])}}">
                                    查看公众号信息
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="alert alert-light d-block text-center" role="alert">
                    <strong class="text-secondary"> <i class="fa fa-info-circle"></i> 还没有添加公众号</strong>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('js')
    <script>
        function destroy(bt, title) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除 <b class="text-danger">[' + title + ']</b>公众号吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush