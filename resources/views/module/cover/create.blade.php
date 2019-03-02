@extends('layouts.module')
@section('content')
    @include('components.breadcrumb',['menus'=>['微信图文消息'=>'#']])
    <form action="{{module_link('module.cover.store')}}" method="post">
        @csrf
        @include('components.keyword',['tag'=>'cover','system'=>1,'model'=>$cover])
        <div class="card">
            <div class="card-header">
                模块微信入口设置
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>信息标题</label>
                    <input type="text" name="title" class="form-control" required value="{{old('title',$cover['title']??'')}}">
                </div>
                <div class="form-group">
                    <label>简短介绍</label>
                    <textarea name="discription" class="form-control" required>{{old('title',$cover['title']??'')}}</textarea>
                </div>
                <div class="form-group">
                    <label>文章图片</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="picurl" readonly="" required
                               value="{{old('picurl',$cover['picurl']??asset('images/nopic.jpg'))}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="uploadImage('picurl')" type="button">
                                选择文件
                            </button>
                        </div>
                    </div>
                    <img class="img-thumbnail d-block mt-1"
                         src="{{old('picurl',$cover['picurl']??asset('images/nopic.jpg'))}}" style="width: 150px;">
                </div>
                <div class="form-group">
                    <label>跳转链接</label>
                    <input type="text" name="url" class="form-control" required value="{{old('url',$cover['url']??'')}}">
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3">保存提交</button>
    </form>
@endsection