@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                用户列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">
                编辑用户
            </a>
        </li>
    </ul>
        <form action="{{route('user.update',$user)}}" method="post">
            @csrf @method('PUT')
            @include('user._form')
        </form>
@endsection