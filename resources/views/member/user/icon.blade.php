@extends('member.layouts.master')
@section('content')
    <div class="row justify-content-center  __web-inspector-hide-shortcut__">
        <form action="{{route('member.user.update',auth()->user())}}" method="post" class="col-sm-8" id="form-icon">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    头像设置
                </div>
                <div class="card-body  text-center">
                    <input type="hidden" class="form-control  form-control-sm" name="icon" readonly=""
                           value="{{auth()->user()->icon}}">
                    <div class="avatar avatar-xl mb-2" onclick="upImagePc(this)">
                        <img src="{{auth()->user()->icon}}" alt="..." class="u-xl-avatar rounded-circle">
                    </div>
                    <br>
                    <span class="help-block text-muted small">请上传 200X200 像素并小于200KB的JPG图片</span>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('css')
    <style>
        .avatar {
            cursor: pointer;
        }
    </style>
@endpush
@push('js')
    <script>
        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    $("[name='icon']").val(images[0]);
                    $(".avatar img").attr('src', images[0]);
                    $("#form-icon").submit();
                }, {width: 700, fileSingleSizeLimit: 200 * 1024, multiple: true})
            });
        }
    </script>
@endpush
