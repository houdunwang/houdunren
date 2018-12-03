@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container {{route_class()}}">
        <div class="{{route_class()}}">
            <div class="container u-space-3 pb-1" style="padding-top: 5rem;">
                <div class="u-cubeportfolio">
                    <div id="filterControls" class="list-inline cbp-l-filters-alignRight text-center">
                        <a class="list-inline-item  u-cubeportfolio__item cbp-filter-item-active"
                           href="{{route('edu.lesson.lists')}}">
                            <span class="badge {{active_class(if_route('edu.lesson.lists'),'badge-primary','badge-soft-secondary')}}">全部</span>
                        </a>
                        @foreach(\App\Models\EduTag::all() as $tag)
                        <a class="list-inline-item cbp-filter-item u-cubeportfolio__item"
                           href="{{route('edu.lesson.tag',$tag)}}">
                            <span class="badge {{active_class(if_route_param('tag',$tag['id']),'badge-primary','badge-soft-secondary')}}">{{$tag['name']}}</span>
                        </a>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row listAlias mt-5">
                @foreach($lessons as $lesson)
                    <div class="col-12 col-md-6 col-xl-3 mt-3">
                        <article class="bg-white shadow-sm mb-3">
                            <a href="{{route('edu.lesson.show',$lesson)}}">
                                <div class="position-relative">
                                    <img class="img-fluid w-100 rounded-top"
                                         src="{{$lesson['thumb']}}" alt="{{$lesson['title']}}">
                                </div>
                                <div class="rounded-bottom p-3">
                                    <h4 class="lesson-title">
                                        <a href="{{route('edu.lesson.show',$lesson)}}" tabindex="0" class="text-dark">
                                            {{$lesson['title']}}
                                        </a>
                                    </h4>
                                    <div class="small text-secondary row">
                                        <div class="col-12">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            {{$lesson['updated_at']->diffForHumans()}}
                                            <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                            {{$lesson->video_num}} 节课
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-3">
            {!! $lessons->links() !!}
        </div>
    </div>
@endsection
