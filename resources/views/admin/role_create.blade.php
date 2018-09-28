@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.role.store')}}" method="post">
        @csrf
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
                            <a href="{{route('admin.role.create')}}" class="nav-link mr-3 active">
                                添加角色
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">角色</label>
                        <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存</button>
                </div>
            </div>
        </div>
    </form>
@endsection
