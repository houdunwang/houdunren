@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                用户列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('user.create')}}">
                添加用户
            </a>
        </li>
    </ul>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            @include('user._form')
        </form>
@endsection