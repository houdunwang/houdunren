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
                        <a href="{{route('content.article.index')}}" class="nav-link mr-3">
                            文章列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link mr-3 active">
                            选择发表的文章栏目
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>父级栏目</label>
                    <select name="category_id" class="form-control" required multiple size="15" onchange="select()">
                        @foreach($categories as $cat)
                            <option value="{{$cat['id']}}" {{$cat['_selected']}} {{$cat['_disabled']}}>
                                {!! $cat['_title'] !!}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function select() {
            require(['jquery'], function ($) {
                let category_id = $("[name='category_id']").val();
                location.href = "{{route('content.article.create')}}?category_id=" + category_id;
            })
        }
    </script>
@endpush
