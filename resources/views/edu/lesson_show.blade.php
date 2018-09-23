@extends('edu.layouts.master')
@section('content')
    <div class="{{hd_route_class()}}">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center justify-content-center">
                            <div class="col-auto p-5">
                                <h2 class="text-secondary">{{$lesson->title}}</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            @if($lesson->description)
                                <div class="card card-inactive">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {!! $lesson->description !!}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{--<button class="btn btn-white">收藏课程</button>--}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom-0">
                        课程目录
                    </div>
                    <div class="card-block">
                        <div class="card card-inactive">
                            <ul class="list-group list-group-flush">
                                @foreach($lesson->video as $video)
                                    <a href="{{route('edu.video.show',$video)}}" class="text-secondary p-3 pl-4 list-group-item d-flex align-items-center justify-content-between px-0">
                                        {{$video->title}}
                                        {{--<i class="fe fe-check-circle text-success"></i>--}}
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            公告
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">
                                    <a href="" class="text-secondary"> 晚八点直播</a>
                                </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">
                                    <a href="" class="text-secondary">新手帮助</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
