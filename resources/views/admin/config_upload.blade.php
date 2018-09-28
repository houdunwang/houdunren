@extends('layouts.admin')
@section('menu')
    @include('admin.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'upload'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts._config_menu')
                    <div class="card">
                        <div class="card-header">
                            图片设置
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>图片大小</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="image_size" value="{{$config['data']['image_size']??'500'}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">字节</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>图片最大宽度</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="image_width" value="{{$config['data']['image_width']??'1000'}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">像素</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>图片最大高度</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="image_height" value="{{$config['data']['image_height']??'1000'}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">像素</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">允许类型</label>
                                <input type="text" class="form-control" name="image_type" value="{{$config['data']['image_type']??'jpg,jpeg,gif,png'}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            文件设置
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>文件大小</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="file_size" value="{{$config['data']['file_size']??'2000'}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">字节</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">允许文件类型</label>
                                <input type="text" class="form-control" name="file_type" value="{{$config['data']['file_type']??'zip,rar,doc,txt,pem,json'}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
