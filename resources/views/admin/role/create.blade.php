@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.role.store')}}" method="post" class="small">
        @csrf
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
                                <a href="{{route('admin.role.create')}}" class="nav-link mr-3 active">
                                    添加角色
                                </a>
                            </li>
                        </ul>
                        <div class="form-group">
                            <label for="">中文描述</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">角色标识</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="" aria-describedby="helpId">
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
