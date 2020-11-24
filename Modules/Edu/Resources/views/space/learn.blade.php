@extends('edu::space.layouts.master')
@section('title',$user->name.'粉丝列表')
@section('content')

<div class="card mt-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($videos as $video)
            <li class="list-group-item pl-0 d-flex justify-content-between">
                <a href="{{ route('Edu.front.video.show',$video) }}">
                    {{ $video['title'] }}
                </a>
                <span class="small text-secondary">
                    {{ $video->pivot->created_at->diffForHumans() }}
                </span>
            </li>
            @endforeach
        </ul>
        <div class="mt-2">
            @include('edu::layouts._paginate',['data'=>$videos])
        </div>
    </div>
</div>
@endsection
