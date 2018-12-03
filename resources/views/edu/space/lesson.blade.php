@extends('layouts.space')
@section('content')
    <div class="container">
        <div class="card" data-toggle="lists">
            <div class="card-header">
                <h6 class="text-secondary">帖子列表</h6>
            </div>
            <div class="card-body">
                <div class="row edu-lesson-lists">
                    @foreach($favorites as $favorite)
                        <div class="col-12 col-md-6 col-xl-3 mt-3">
                            <article class="bg-white shadow-sm mb-3">
                                <a href="{{route('edu.lesson.show',$favorite['favorite'])}}">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100 rounded-top"
                                             src="{{$favorite['favorite']['thumb']}}" alt="{{$favorite['favorite']['title']}}">
                                    </div>
                                    <div class="rounded-bottom p-3">
                                        <h4 class="lesson-title">
                                            <a href="{{route('edu.lesson.show',$favorite['favorite'])}}" tabindex="0" class="text-dark">
                                                {{$favorite['favorite']['title']}}
                                            </a>
                                        </h4>
                                        <div class="small text-secondary row">
                                            <div class="col-12">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                {{$favorite['favorite']['updated_at']->diffForHumans()}}
                                                <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                                {{$favorite['favorite']->video_num}} 节课
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            {{$favorites->links()}}
        </div>
    </div>
@endsection