@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('chat.news.index')}}" class="nav-link mr-3 ">
                        图文消息列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chat.news.create')}}" class="nav-link mr-3 active">
                        添加图文消息
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form action="{{route('chat.news.store')}}" method="post">
                @csrf
                @include('chat.layouts._news')
            </form>
        </div>
    </div>
@endsection
