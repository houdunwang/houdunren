@extends('edu.layouts.master')
@section('content')
    <div class="container">
        <div class="{{route_class()}}">
            <div class="container u-space-3 pb-5" style="padding-top: 5rem;">
                <div class="u-cubeportfolio">
                    <div id="filterControls" class="list-inline cbp-l-filters-alignRight text-center">
                        <a class="list-inline-item  u-cubeportfolio__item cbp-filter-item-active"
                            href="http://baidu.com">全部
                        </a>
                        <a class="list-inline-item cbp-filter-item u-cubeportfolio__item" href="#">
                            Branding
                        </a>
                    </div>
                </div>
            </div>
            <div class="row listAlias">
                @foreach($lessons as $lesson)
                    <div class="col-4">
                        <article class="bg-white shadow-sm mb-3">
                            <a href="{{route('edu.lesson.show',$lesson)}}">
                                <div class="position-relative">
                                    <img class="img-fluid w-100 rounded-top"
                                         src="{{$lesson['thumb']}}" alt="Image Description">
                                </div>
                                <div class="rounded-bottom p-5">
                                    <h4 class="h6">
                                        <a href="{{route('edu.lesson.show',$lesson)}}" tabindex="0">{{$lesson['title']}}</a>
                                    </h4>
                                    <div class="small text-secondary">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{$lesson['updated_at']->diffForHumans()}}
                                        <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                        {{$lesson->video()->count()}} 视频
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
