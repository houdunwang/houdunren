@extends('layouts.admin')
@section('menu')
    @include('edu.layouts.menu')
@endsection
@section('content')
    <form action="{{route('edu.lesson.update',$lesson)}}" method="post" id="app">
        @csrf @method('PUT')
        <div class="row">
            @include('edu.layouts._lesson',['field'=>$field])
            <div class=" col-sm-10 mb-5">
                <button class="btn btn-primary">保存发布</button>
            </div>
        </div>
    </form>
@endsection
