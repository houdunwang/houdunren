@extends('edu::space.layouts.master')
@section('title',$user->name.'粉丝列表')
@section('content')

@include('edu::space.favorite_nav')

<div class="card mt-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($videos as $video)
            <li class="list-group-item pl-0 mb-1 pb-3">
                <a href="{{ route('Edu.front.video.show',$video) }}" class="text-muted">
                    {{ $video['title'] }}
                </a>
            </li>

            @endforeach
        </ul>
        <div class="mt-2">
            @include('edu::layouts._paginate',['data'=>$videos])
        </div>
    </div>
</div>
@endsection
