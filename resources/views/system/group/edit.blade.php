@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link " href="{{route('group.index')}}">
                用户组列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('group.create')}}">
                添加用户组
            </a>
        </li>
    </ul>
    <form action="{{route('group.update',$group)}}" method="post">
        @csrf @method('PUT')
        @include('group._form')
    </form>
@endsection