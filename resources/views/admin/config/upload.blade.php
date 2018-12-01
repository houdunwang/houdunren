@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'upload'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('admin.config.layouts._menu')
                    <div class="card mb-3">
                        <div class="card-header">
                            上传方式
                        </div>
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="driver" id="driver1" value="local"
                                {{active_class(config_get('admin.upload.driver','local')=='local','checked')}}>
                                <label class="form-check-label" for="driver1">本地上传</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="driver" id="driver2" value="oss"
                                        {{active_class(config_get('admin.upload.driver')=='oss','checked')}}>
                                <label class="form-check-label" for="driver2">阿里云（请先配置下面的阿里云设置）</label>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    阿里云设置
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">accessKeyId</span>
                                        </div>
                                        <input type="text" class="form-control" name="oss[accessKeyId]"
                                               value="{{config_get('admin.upload.oss.accessKeyId')}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">accessKeySecret</span>
                                        </div>
                                        <input type="text" class="form-control" name="oss[accessKeySecret]"
                                               value="{{config_get('admin.upload.oss.accessKeySecret')}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">bucket</span>
                                        </div>
                                        <input type="text" class="form-control" name="oss[bucket]"
                                               value="{{config_get('admin.upload.oss.bucket')}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">endpoint</span>
                                        </div>
                                        <input type="text" class="form-control" name="oss[endpoint]"
                                               value="{{config_get('admin.upload.oss.endpoint')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">图片上传设置</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">图片大小</span>
                                            </div>
                                            <input type="text" class="form-control" name="image[size]"
                                                   value="{{config_get('admin.upload.image.size',2000000)}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">字节</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">最大宽度</span>
                                            </div>
                                            <input type="text" class="form-control" name="image[width]"
                                                   value="{{config_get('admin.upload.image.width',800)}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">像素</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">最大高度</span>
                                            </div>
                                            <input type="text" class="form-control" name="image[height]"
                                                   value="{{config_get('admin.upload.image.height',600)}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">像素</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">允许类型</span>
                                            </div>
                                            <input type="text" class="form-control" name="image[type]"
                                                   value="{{config_get('admin.upload.image.type','jpg,jpeg,gif,png')}}">
                                        </div>
                                    </div>
                                    <div class="alert alert-outline-accent fade show" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">超过图片允许的最大高度或宽度将自动裁切</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">文件上传设置</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">文件大小</span>
                                            </div>
                                            <input type="text" class="form-control" name="file[size]"
                                                   value="{{config_get('admin.upload.file.size',2000000)}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">字节</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">文件类型</span>
                                            </div>
                                            <input type="text" class="form-control" name="file[type]"
                                                   value="{{config_get('admin.upload.file.type','zip,rar,doc,txt,pem,json')}}">
                                        </div>
                                    </div>
                                </div>
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
