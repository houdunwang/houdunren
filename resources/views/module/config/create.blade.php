@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['参数设置'=>'#']]) @endcomponent
    <div class="alert alert-info">
        使用 config_get('模块标识.配置变量') 形式读取配置项 <br>
        配置项模板位于 Modules/{{module()['name']}}/Resources/views/system/config.blade.php
    </div>
    <form method="post" class="form-horizontal" method="post" action="{{module_link('module.config.store')}}">
        @csrf
        @include(strtolower(module()['name']).'::system.config')
        <button class="btn btn-success mt-2">保存提交</button>
    </form>
@stop