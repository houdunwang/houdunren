@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.role.update',$role)}}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
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
                        <div class="form-group">
                            <label>中文描述</label>
                            <input type="text" name="title" value="{{old('title',$role['title'])}}" class="form-control"
                                   placeholder="请输入角色中文名称" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label>角色标识</label>
                            <input type="text" name="name" value="{{old('name',$role['name'])}}" class="form-control"
                                   placeholder="请输入角色的英文字母标识" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">保存</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
