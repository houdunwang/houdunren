@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <form action="{{route('admin.module.update',$module)}}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('admin.module.index')}}" class="nav-link mr-3">
                                模块列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link mr-3 active">
                                修改编辑
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>模块名称</label>
                        <input type="text" value="{{old('title',$module['title'])}}" class="form-control text-secondary" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label>模块标识</label>
                        <input type="text" value="{{old('name',$module['name'])}}" class="form-control  text-secondary" disabled>
                    </div>
                    <div class="form-group">
                        <label>访问域名</label>
                        <input type="text" name="domain" value="{{old('domain',$module['domain'])}}" class="form-control" placeholder="如：www.houdunren.com">
                        <small id="helpId" class="text-muted">
                            设置域名后可直接访问到模块的 HomeController@index 方法 , 域名需要设置协议前缀
                        </small>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存</button>
                </div>
            </div>
        </div>
    </form>
@endsection
