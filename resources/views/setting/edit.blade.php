@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i></li>
        <li><a href="{{route('setting.index')}}">系统设置</a></li>
    </ol>
    <form method="post" class="form-horizontal" method="post" action="{{route('setting.update',$name)}}">
        @include('setting._tabs',['name'=>$name])
        @csrf @method('PUT')
        @include('setting._'.$name)
        <button class="btn btn-primary">提交</button>
    </form>
@stop