@extends('layout.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('doc.store')}}" method="post" id="app">
        @csrf
        <div class="card col-12" >
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('doc.index')}}" class="nav-link mr-3 ">
                            文档列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('doc.create')}}" class="nav-link mr-3 active">
                            添加文档
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">文档标题</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">预览图</label>
                    <div class="input-group mb-1">
                        <input class="form-control" name="preview" value="">
                        <div class="input-group-append">
                            <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                        </div>
                    </div>
                    <div style="display: inline-block;position: relative;">
                        <img src="{{asset('org/hdjs/image/nopic.jpg')}}" class="img-responsive img-thumbnail" width="150">
                        <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                            onclick="removeImg(this)">×</em>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-white">保存数据</button>
    </form>
@endsection
