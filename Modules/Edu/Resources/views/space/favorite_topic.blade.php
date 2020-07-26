@extends('edu::layouts.space')
@section('title',$user->name.'粉丝列表')
@section('content')

@include('edu::space.favorite_nav')

<div class="bg-white border shadow-sm p-4 mt-3">
    @foreach ($topics as $topic)
    @include('edu::components.topic')
    @endforeach
</div>

<div class="mt-3">
    @include('edu::layouts.paginate',['data'=>$topics])
</div>

@endsection
