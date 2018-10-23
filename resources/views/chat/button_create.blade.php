@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('chat.button.index')}}" class="nav-link mr-3">
                        微信菜单列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chat.button.create')}}" class="nav-link mr-3 active">
                        添加微信菜单
                    </a>
                </li>
            </ul>
        </div>
        <form action="{{route('chat.button.store')}}" method="post">
            @csrf
            @include('chat.layouts._button')
        </form>
    </div>
@endsection

