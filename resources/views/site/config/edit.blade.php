@extends('layouts.admin')
@section('content')
    @include('site.config._tabs',['name'=>$name])
    <div class="alert alert-secondary" role="alert">
        使用 config_get('变量名','默认值','site') 形式获取配置项，如获取站点名称 config_get('info.webname','默认值','site')
    </div>
    <form method="post" class="form-horizontal" method="post" action="{{route('site.config.update',[$site,$name])}}">
        @csrf @method('PUT')
        @include('site.config._'.$name)
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop