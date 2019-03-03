@extends('layouts.member')
@section('content')
    @include('shop::member.module._tab')
    <form action="{{route('shop.member.module.update',$module)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">设置模块参数</div>
            <div class="card-body">
                <div class="form-group">
                    <label>模块名称</label>
                    <input type="text" name="title" class="form-control" required
                           value="{{old('title',$module['title'])}}">
                </div>
                <div class="form-group">
                    <label>预览图</label>
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="thumb" readonly="" required
                               value="{{old('thumb',$module['thumb'])}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="uploadImage('thumb')" type="button">
                                选择文件
                            </button>
                        </div>
                    </div>
                    <img class="img-thumbnail d-block mt-1"
                         src="{{old('thumb',$module['thumb'])}}" style="width: 150px;">
                </div>
                <div class="form-group">
                    <label>更新日志</label>
                    <textarea class="form-control" name="logs" rows="3">{{$module['logs']}}</textarea>
                    <small class="text-secondary d-block mt-1">每行一条更新日志</small>
                </div>
                <div class="form-group">
                    <label>简短介绍</label>
                    <textarea class="form-control" name="description" rows="3" required>{{$module['description']}}</textarea>
                    <small class="text-secondary d-block mt-1">请输入不大于50个字的简短介绍</small>
                </div>
                <div class="form-group">
                    <label>详细介绍</label>
                    <div class="input-group">
                        <textarea id="content" name="content" style="height:300px;width:100%;">{{$module['content']}}</textarea>
                        <script>
                            require(['hdjs'], function (hdjs) {
                                hdjs.ueditor('content');
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3">保存提交</button>
    </form>
@endsection