@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <form action="{{route('admin.role.update',$role)}}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link mr-3">
                                角色列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link mr-3 active">
                                修改角色
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>中文描述</label>
                        <input type="text" name="title" value="{{old('title',$role['title'])}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label>角色标识</label>
                        <input type="text" name="name" value="{{old('name',$role['name'])}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存</button>
                </div>
            </div>
        </div>
    </form>
@endsection
