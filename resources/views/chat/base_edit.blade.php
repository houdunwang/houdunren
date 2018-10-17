@extends('chat.layouts.admin')
@section('content')
    <form action="{{route('chat.base.update',$base)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('chat.base.index')}}" class="nav-link mr-3">
                            普通文本消息
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-3 active">
                            修改文本消息
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                @include('chat.layouts._base')
            </div>
        </div>
    </form>
@endsection
