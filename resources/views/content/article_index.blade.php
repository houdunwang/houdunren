@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link mr-3 active">
                            文章列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.article.create')}}" class="nav-link mr-3">
                            发表文章
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(button) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush
