@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <form action="{{route('content.category.store')}}" method="post" class="col-12">
            @csrf
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-sm">
                        <li class="nav-item">
                            <a href="{{route('content.category.index')}}" class="nav-link mr-3">
                                栏目列表
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('content.category.create')}}" class="nav-link mr-3 active">
                                添加栏目
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>栏目名称</label>
                        <input type="text" name="title" value="{{old('title')}}" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>所属模型</label>
                        <select name="model_id" class="form-control" required>
                            @foreach($models as $model)
                                <option value="{{$model['id']}}">{{$model['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>父级栏目</label>
                        <select name="parent_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['_title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>封面栏目</label>
                        <div class="custom-control custom-checkbox-toggle">
                            <input type="checkbox" class="custom-control-input" name="is_home" id="is_home">
                            <label class="custom-control-label" for="is_home"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>栏目描述</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>跳转链接</label>
                        <input type="text" name="redirect_url" value="{{old('redirect_url')}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    模板设置
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>封面模板</label>
                        <input type="text" name="index_template" required value="{{old('index_template','index_template.blade.php')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>列表页模板</label>
                        <input type="text" name="list_template" required value="{{old('list_template','list_template.blade.php')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>内容页模板</label>
                        <input type="text" name="article_template" required value="{{old('article_template','article_template.blade.php')}}" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection
