@extends('edu::layouts.space')
@section('title',$user->name.'粉丝列表')
@section('content')

@include('edu::space.favorite_nav')

<div class="card mt-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($videos as $video)
            @include('edu::layouts.video')
            @endforeach
        </ul>
        <div class="mt-2">
            @include('edu::layouts.paginate',['data'=>$videos])
        </div>
    </div>
</div>
@endsection
