@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.tag.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="card col-12 pb-0 mb-0 border-0 rounded-0">
                <div class="card-body pb-0">
                    <ul class="nav nav-tabs nav-overflow nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('edu.tag.index')}}"
                               class="nav-link {{active_class(if_route('edu.tag.index'))}}">
                                标签列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('edu.tag.create')}}"
                               class="nav-link {{active_class(if_route('edu.tag.create'))}}">
                                新增标签
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('edu.tag.layouts._tag')
        </div>
    </form>
@endsection
