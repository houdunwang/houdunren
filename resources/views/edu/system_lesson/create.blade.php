@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('edu.system.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-overflow nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('edu.system.index')}}"
                               class="nav-link {{active_class(if_route('edu.system.index'))}}">
                                课程列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('edu.system.create')}}"
                               class="nav-link {{active_class(if_route('edu.system.create'))}}">
                                新增课程
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @include('edu.system_lesson.layouts._lesson')
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection