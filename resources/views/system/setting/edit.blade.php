@extends('layouts.system')
@section('content')
<form method="post" class="form-horizontal" method="post" action="{{route('system.setting.update',$name)}}">
        @include('system.setting._tabs',['name'=>$name])
        @csrf @method('PUT')
        @include('system.setting._'.$name)
        <button class="btn btn-primary mt-2">保存提交</button>
    </form>
@stop