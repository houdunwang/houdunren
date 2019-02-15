@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><i class="fa fa-home"></i></li>
        <li class="breadcrumb-item "><a href="#">首页</a></li>
        <li class="breadcrumb-item ">设置站点基本信息</li>
    </ol>
    <form role="form" method="post" action="{{route('site.store')}}" class="form-horizontal">
        @csrf
        @include('site.form')
        <button type="submit" class="btn btn-primary mt-2">保存提交</button>
    </form>
@endsection