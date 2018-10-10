@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <form action="{{route('content.article.store')}}" method="post">
        @csrf
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
                            <a href="{{route('content.article.create')}}" class="nav-link mr-3 active">
                                发表文章
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('content.layouts._article')
        </div>
    </form>
@endsection