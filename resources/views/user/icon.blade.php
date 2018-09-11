@extends('user.layouts.master')
@section('content')
    <div class="row justify-content-center mt-4 __web-inspector-hide-shortcut__">
        <form action="{{route('member.user.update',auth()->user())}}" method="post" class="col-sm-5">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>头像设置</h4>
                </div>
                <div class="card-body  text-center">
                    <input type="hidden" class="form-control  form-control-sm" name="icon" readonly="" value="{{auth()->user()->icon}}">
                    <div class="avatar avatar-xxl mb-2" onclick="upImagePc(this)">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <br>
                    <span class="help-block text-muted small">请上传 200X200 像素并小于200KB的JPG图片</span>
                </div>
                {{--<div class="card-footer">--}}
                    {{--<button class="btn btn-secondary btn-xs btn-block">--}}
                        {{--保存头像--}}
                    {{--</button>--}}
                {{--</div>--}}
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
                    $("form").submit();
                }, {width: 700, extensions: 'jpg,jpeg', fileSingleSizeLimit: 200 * 1024, multiple: true})
            });
        }
    </script>
@endpush
