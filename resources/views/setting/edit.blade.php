@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i></li>
        <li><a href="{{route('setting.index')}}">系统设置</a></li>
    </ol>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active">
            <a href="javascript:void(0)">上传配置</a>
        </li>
    </ul>
    <form method="post" class="form-horizontal" method="post" action="{{route('setting.update','upload')}}">
        @csrf @method('PUT')
        <div class="panel panel-default">
            <div class="panel-heading">上传方式</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">上传方式</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" value="local" name="way" {{active_class(($config['way']??'local')=='local','checked')}}> 本地上传
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="oss" name="way" {{active_class(($config['way']??'')=='oss','checked')}}> 阿里云
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">图片大小</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control" name="image_size"
                                   value="{{$config['local']['image_size']??200000000}}">
                            <span class="input-group-addon">字节</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">文件大小</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control" name="file_size"
                                   value="{{$config['local']['file_size']??200000000}}">
                            <span class="input-group-addon">字节</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">上传类型</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="local[type]"
                               value="{{$config['local']['type']??'jpg,jpeg,gif,png,zip,rar,doc,txt,pem,json'}}">
                        <span class="help-block">请用英文半角逗号分隔文件类型</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                本地上传配置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">上传目录</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="local[path]"
                               value="{{$config['local']['path']??'attachment'}}">
                        <span class="help-block">上传到本地服务器的目录名称</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                阿里云上传配置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">regionId</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="oss[regionId]"
                               value="{{$config['oss']['regionId']??''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">accessKeySecret</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="oss[accessKeySecret]"
                               value="{{$config['oss']['accessKeySecret']??''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">bucket</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="oss[bucket]"
                               value="{{$config['oss']['bucket']??''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">endpoint</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="oss[endpoint]"
                               value="{{$config['oss']['endpoint']??''}}">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">提交</button>
    </form>
@stop