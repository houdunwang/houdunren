@extends('layouts.admin')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">新建站点</h3>
        </div>
        <form role="form" method="post" action="{{route('site.store')}}">
            @csrf
            @include('site.form')
        </form>
    </div>
@stop