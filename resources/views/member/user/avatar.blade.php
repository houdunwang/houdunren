@extends('layouts.member')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">头像设置</h3>
        </div>
        <form id="form" role="form" method="post" action="{{route('user.update',[$user,'action'=>'avatar'])}}">
            {{csrf_field()}} @method('PUT')
            <div class="box-body">
                <img class="img-responsive img-circle" src="{{auth()->user()->avatar}}" onclick="avatar()" id="icon">
                <input type="hidden" name="icon" value="{{auth()->user()['icon']}}">
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        function avatar() {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    $("#icon").attr('src',images[0]);
                    $("[name='icon']").val(images[0]);
                    $("#form").submit();
                })
            });
        }
    </script>
@endpush