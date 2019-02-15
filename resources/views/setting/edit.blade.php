@extends('layouts.admin')
@section('content')
<form method="post" class="form-horizontal" method="post" action="{{route('setting.update',$name)}}">
        @include('setting._tabs',['name'=>$name])
        @csrf @method('PUT')
        @include('setting._'.$name)
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop