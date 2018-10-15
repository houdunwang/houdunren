@extends('content.layouts.admin')
@section('content')
    <form action="{{route('content.model.update',$model)}}" method="post" id="app">
        @csrf @method('PUT')
        <div class="row">
            <div class="card col-12 pb-0 mb-0 border-0 rounded-0">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('content.model.index')}}" class="nav-link mr-3 ">
                                模型列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('content.model.create')}}" class="nav-link mr-3 active">
                                添加模型
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('content.layouts._model')
        </div>
    </form>
@endsection
