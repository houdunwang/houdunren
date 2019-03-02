@extends('layouts.member')
@section('content')
    <form action="{{route('member.icon.store')}}" method="post">
        @csrf
        <input type="hidden" name="icon">
        <div class="card shadow-sm">
            <div class="card-header">修改资料</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 text-center">
                        <img src="{{asset(auth()->user()['avatar'])}}" class="img-thumbnail" style="cursor: pointer" onclick="uploadImage()">
                        <small class="text-secondary d-block mt-2">请上传200X200像素的图片</small>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@push('js')
    <script>
        function uploadImage() {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    $("[name=icon]").val(images[0]);
                    $("form").trigger('submit');
                })
            });
        }
    </script>
@endpush