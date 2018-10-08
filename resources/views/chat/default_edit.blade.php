@extends('layouts.admin')
@section('menu')
    @include('chat.layouts.menu')
@endsection
@section('content')
    <form action="{{route('chat.default.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-3 active">
                            设置微信默认消息
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">欢迎消息</label>
                    <input type="text" name="welcome" value="{{$message['welcome']}}" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">
                        粉丝关注公众号时的欢迎消息内容
                        <a href="javascript:;" id="welcome" class="text-dark" data-original-title="" title="">
                            <i class="fa fa-github-alt"></i> 表情
                        </a>
                    </small>
                </div>
                <div class="form-group">
                    <label for="">默认回复</label>
                    <input type="text" name="default_message" value="{{$message['default_message']}}" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">
                        发送文本或关键词时没有匹配结果时，回复的默认消息
                        <a href="javascript:;" id="defaultMessage" class="text-dark" data-original-title="" title="">
                            <i class="fa fa-github-alt"></i> 表情
                        </a>
                    </small>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-sm">保存提交</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        require(['hdjs', 'bootstrap'], function (hdjs) {
            hdjs.emotion({
                btn: "#welcome",
                input: "[name='welcome']"
            });
            hdjs.emotion({
                btn: "#defaultMessage",
                input: "[name='default_message']"
            });
        });
    </script>
@endpush
