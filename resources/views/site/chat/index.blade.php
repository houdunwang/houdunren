@extends('layouts.admin')
@section('content')
    @include('site.chat._tabs')
    <div class="card">
        <div class="card-header">
            微信公众号列表
        </div>
        <div class="card-body">
            @if (count($chats)>0)
                @foreach($chats as $chat)
                    <div class="row">
                        <div class="col-sm-12 col-md-3 text-dark">
                            <img src="{{$chat['icon']}}" class="img-thumbnail wx-img">
                            <img src="{{$chat['qr']}}" class="img-thumbnail wx-img">
                        </div>
                        <div class="col-sm-3 col-md-4 text-dark mt-sm-1">
                            <strong class="title text-dark d-block">
                                {{$chat['name']}}
                            </strong>
                            <small class="text-secondary pr-2">
                                类型: {{$chat['genreTitle']}}
                            </small>
                            <small class="text-secondary">
                                微信号: {{$chat['account']}}
                            </small>
                        </div>
                        <div class="col-sm-4 col-md-5 text-right mt-3">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{route('site.chat.edit',[$site,$chat])}}">
                                    编辑公众号资料
                                </a>
                                <form action="{{route('site.chat.destroy',[$site,$chat])}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="destroy(this,'确定删除 {{$chat['name']}} 公众号吗？')">
                                    删除公众号
                                </button>
                                <a class="btn btn-outline-info" href="{{route('site.chat.show',[$site,$chat])}}">
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
{{--@push('js')--}}
    {{--<script>--}}
        {{--function destroy(bt, title) {--}}
            {{--require(['hdjs'], function (hdjs) {--}}
                {{--hdjs.confirm('确定删除 <b class="text-danger">[' + title + ']</b>公众号吗？', function () {--}}
                    {{--$(bt).next('form').submit();--}}
                {{--});--}}
            {{--})--}}
        {{--}--}}
    {{--</script>--}}
{{--@endpush--}}