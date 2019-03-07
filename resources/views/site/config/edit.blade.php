@extends('layouts.site')
@section('content')
    @include('site.config._tabs',['name'=>$name])

    <form method="post" class="form-horizontal" method="post" action="{{route('site.config.update',[$site,$name])}}">
        @csrf @method('PUT')
        @include('site.config._'.$name)
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop