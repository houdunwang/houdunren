@extends('edu.layouts.master')
@section('content')
    <div class="{{route_class()}}">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="alert alert-white p-4 text-muted" role="alert">
                    <span class="col-10">投资在学习上的时间是最值得的</span>
                    <button class="btn btn-white col-auto text-muted">订阅学习全部技术</button>
                </div>
            </div>
        </div>
        <div class="row listAlias">
            @foreach($lessons as $lesson)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <a href="{{route('edu.lesson.show',$lesson)}}">
                            <img src="{{$lesson['thumb']}}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title mb-3 name">
                                        <a href="{{route('edu.lesson.show',$lesson)}}" class="text-secondary">
                                            {{$lesson['title']}}
                                        </a>
                                    </h4>
                                    <p class="card-text small text-muted">
                                        <span class="fe fe-clock"></span> {{$lesson['updated_at']->diffForHumans()}}
                                        <span class="fe fe-film ml-3"></span> {{$lesson->video()->count()}} 课时
                                    </p>
                                </div>
                                <div class="col-auto">
                                    {{--<a href="#!" class="btn btn-white btn-sm">--}}
                                        {{--开始学习--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown">--}}
                                        {{--<a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--<i class="fe fe-more-vertical"></i>--}}
                                        {{--</a>--}}
                                        {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                            {{--<a href="#!" class="dropdown-item">--}}
                                                {{--开始学习--}}
                                            {{--</a>--}}
                                            {{--<a href="#!" class="dropdown-item">--}}
                                                {{--添加收藏--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            {{--<hr>--}}
                            {{--<div class="row align-items-center">--}}
                                {{--<div class="col-auto">--}}
                                    {{--<div class="avatar-group">--}}
                                        {{--<a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">--}}
                                            {{--<img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">--}}
                                        {{--</a>--}}
                                        {{--<a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">--}}
                                            {{--<img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">--}}
                                        {{--</a>--}}
                                        {{--<a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">--}}
                                            {{--<img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">--}}
                                        {{--</a>--}}
                                        {{--<a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">--}}
                                            {{--<img src="{{asset('org/Dashkit-1.1.2')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
