@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'site'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts._config_menu')
                    <div class="form-group">
                        <label>网站名称</label>
                        <input type="text" class="form-control" name="webname"
                               value="{{$config['data']['webname']??'后盾人'}}">
                    </div>
                    <div class="form-group">
                        <label>网站标志</label>
                        <div class="input-group mb-1">
                            <input class="form-control" name="logo" readonly=""
                                   value="{{$config['data']['logo']??''}}">
                            <div class="input-group-append">
                                <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                            </div>
                        </div>
                        <div style="display: inline-block;position: relative;">
                            <img src="{{asset($config['data']['logo']??'images/nopic.jpg')}}"
                                 class="img-responsive img-thumbnail" width="150">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">网站关键字</label>
                        <input type="text" class="form-control" name="keywords"
                               value="{{$config['data']['keywords']??'PHP,Linux,HTML5'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">网站描述</label>
                        <textarea class="form-control" rows="3"
                                  name="description">{{$config['data']['description']??'后盾人专注PHP与WEB开发实战'}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">底部版权信息</label>
                        <input type="text" class="form-control" name="copyright"
                               value="{{$config['data']['copyright']??'Copyright © 2010-2017 houdunren.com All Rights Reserved 京ICP备12048441号-322'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">联系电话</label>
                        <input type="text" class="form-control" name="tel" value="{{$config['data']['tel']}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">联系邮箱</label>
                        <input type="text" class="form-control" name="email" value="{{$config['data']['email']}}">
                    </div>
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='logo']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                })
            });
        }
    </script>
@endpush
