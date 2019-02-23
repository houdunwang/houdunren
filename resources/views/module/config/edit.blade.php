@extends('layouts.module')
@section('content')
    <form method="post" class="form-horizontal" method="post" action="{{route('config.update',$name)}}">
        @csrf @method('PUT')
        @include(strtolower(module()['name']).'::config')
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop