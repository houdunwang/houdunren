@extends('layouts.admin')
@section('menu')
    @include('chat.layouts.menu')
@endsection
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
                    <a href="#" class="nav-link mr-3 active">
                        修改微信菜单
                    </a>
                </li>
            </ul>
        </div>
        <form action="{{route('chat.button.update',$button)}}" method="post">
            @csrf @method('PUT')
            @include('chat.layouts._button')
        </form>
    </div>
@endsection

