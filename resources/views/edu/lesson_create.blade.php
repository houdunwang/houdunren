@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.lesson.store')}}" method="post" id="app">
        @csrf
        <div class="row">
            @include('edu.layouts._lesson')
            <div class=" col-sm-10 mb-5">
                <button class="btn btn-primary">保存发布</button>
            </div>
        </div>
    </form>
@endsection
