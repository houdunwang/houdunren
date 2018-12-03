@extends('layouts.member')
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('member.user.update',auth()->user())}}" method="post" class="col-sm-12">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header text-secondary">
                    个人信息
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>昵称</label>
                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-xs" type="submit">确定</button>
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
                }, {width: 700, extensions: 'jpg,jpeg', fileSingleSizeLimit: 200 * 1024, multiple: true})
            });
        }
    </script>
@endpush
