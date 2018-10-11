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
                    <label>选择文章栏目</label>
                    <select name="category_id" class="form-control rounded-0" required multiple size="17" onchange="select()">
                        @foreach($categories as $cat)
                            <option value="{{$cat['id']}}"
                                    {{$cat['is_homepage']?'disabled':''}}
                                    class="{{$cat['is_homepage']?'text-secondary':'test-dark'}}"
                            >
                                {!! $cat['_title'] !!} ({{mb_substr($cat->model->title,0,1)}})
                            </option>
                        @endforeach
                    </select>
                    @push('css')
                        <style>
                            option{
                                font-weight: bold;
                                line-height: 2em;
                                margin-bottom: 10px;
                                border-bottom: solid 1px #f3f3f3;
                                padding-bottom: 5px;

                            }
                        </style>
                    @endpush
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
