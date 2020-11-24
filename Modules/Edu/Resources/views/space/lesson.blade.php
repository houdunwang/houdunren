@extends('edu::space.layouts.master')
@section('title',$user->name.'粉丝列表')
@section('content')

@include('edu::space.favorite_nav')

<div class="bg-white border shadow-sm p-4 mt-3">
    <div class="row">
        @foreach ($lessons as $lesson)
        @include('edu::layouts.lesson')
        @endforeach
    </div>
</div>

<div class="mt-3">
    @include('edu::layouts._paginate',['data'=>$lessons])
</div>

@endsection
