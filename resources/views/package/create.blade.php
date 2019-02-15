@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link" href="{{route('package.index')}}">
                套餐列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('package.create')}}">
                添加套餐
            </a>
        </li>
    </ul>

    <form action="{{route('package.store')}}" method="post">
        @csrf
        @include('package._form')
    </form>
@endsection