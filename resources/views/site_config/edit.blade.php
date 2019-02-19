@extends('layouts.admin')
@section('content')
    @include('site_config._tabs',['name'=>$name])
    <form method="post" class="form-horizontal" method="post" action="{{route('config.site.update',[$site,'name'=>$name])}}">
        @csrf @method('PUT')
        @include('site_config._'.$name)
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop