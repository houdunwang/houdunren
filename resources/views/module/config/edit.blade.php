@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['参数设置'=>'#']]) @endcomponent
    <div class="alert alert-info">
        使用 config_get('模块标识.配置变量') 形式读取配置项 <br>
        配置项模板位于 Modules/{{module()['name']}}/Resources/views/system/config.blade.php
    </div>
    <form method="post" class="form-horizontal" method="post" action="{{route('module.config.update',$name)}}">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                <span class="text-dark">{{module()['title']}}</span> 模块配置设置
            </div>
            <div class="card-body">
                @include(strtolower(module()['name']).'::system.config')
            </div>
        </div>
        <button class="btn btn-success mt-2">保存提交</button>
    </form>
@stop