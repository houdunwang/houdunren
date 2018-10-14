@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <form action="{{route('content.slide.update',$slide)}}" method="post" class="col-12">
            @csrf @method('PUT')
            <div class="card col-12">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('content.slide.index')}}" class="nav-link mr-3">
                                幻灯片列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('content.slide.edit',$slide)}}" class="nav-link mr-3 active">
                                修改幻灯片
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @include('content.layouts._slide')
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection