@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('edu.config.update')}}" method="post" class="col-12">
            @csrf @method('PUT')
            <div class="card mb-3">
                <div class="card-header">
                    基本配置
                </div>
                <div class="card-body small">
                    <div class="form-group">
                        <label>网站标志</label>
                        <div class="input-group mb-1">
                            <input class="form-control" name="logo"
                                   value="{{config_get('edu.logo')}}">
                            <div class="input-group-append">
                                <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                            </div>
                        </div>
                        <div style="display: inline-block;position: relative;">
                            <img src="{{config_get('edu.logo',asset('images/nopic.jpg'))}}"
                                 class="img-responsive img-thumbnail" width="150">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    直播设置
                </div>
                <div class="card-body small">
                    <div class="form-group">
                        <label>直播地址</label>
                        <input type="text" class="form-control" name="live_path"
                               value="{{config_get('edu.live_path','')}}" placeholder="输入B站或斗鱼的直播链接">
                    </div>
                    <div class="form-group">
                        <label>直播标题</label>
                        <input type="text" class="form-control" name="live_title"
                               value="{{config_get('edu.live_title','')}}" placeholder="首页直播窗口标题">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">直播广告</label>
                        <textarea class="form-control" rows="3" name="notice" placeholder="直播窗口下的广告内容">{{config_get('edu.notice')}}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存提交</button>
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