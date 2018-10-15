@extends('content.layouts.admin')
@section('content')
    <form action="{{route('content.article.update',$article)}}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="card col-12 mb-0 border-0 rounded-0">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('content.article.index')}}" class="nav-link mr-3 ">
                                文章列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link mr-3 active">
                                修改文章
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('content.layouts._article')
        </div>
    </form>
@endsection