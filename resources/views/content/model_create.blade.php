@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <form action="{{route('content.model.store')}}" method="post" id="app">
        @csrf
        <div class="row">
            <div class="card col-12">
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
                <div class="card-body">
                    <div class="form-group">
                        <label>模型中文描述</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="请输入模型中文描述">
                    </div>
                </div>
            </div>
            @include('content.layouts._model')
        </div>
    </form>
@endsection
