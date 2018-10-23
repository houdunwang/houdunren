@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('content.category.update',$category)}}" method="post" class="col-12">
            @csrf @method('PUT')
            <div class="card mb-0 border-0 rounded-0">
                <div class="card-body pb-0">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('content.category.index')}}" class="nav-link mr-3">
                                栏目列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('content.category.create',$category)}}" class="nav-link mr-3 active">
                                修改栏目
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('content.layouts._category')
        </form>
    </div>
@endsection
