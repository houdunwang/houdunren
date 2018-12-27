@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                {{--                            @include('edu.video.layouts._play')--}}
                @can('view',$video->lesson)
                    @include('edu.video.layouts._play')
                @else
                    @include('edu.video.layouts._cant_play')
                @endcan
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        课程目录
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush small">
                            @foreach($videos as $v)
                                @if($video->id == $v['id'])
                                    <a href="{{route('edu.video.show',$v)}}"
                                       class="text-primary list-group-item px-0">
                                        {{$v->title}}
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a href="{{route('edu.video.show',$v)}}"
                                       class="text-muted list-group-item d-flex align-items-center justify-content-between px-0">
                                        &nbsp;{{$v->title}}
                                    </a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--<div class="mt-3">--}}
                {{--@include('edu.layouts._learning_dynamic',['row'=>10])--}}
                {{--</div>--}}
            </div>
            <div class="col-sm-8">
                @can('view',$video->lesson)
                    @include('common.comment',['comments'=>$comments,'model'=>$video])
                @endcan
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        //课程目录
        function category() {
            $("#category").toggle();
        }

        require(['hdjs'], function (hdjs) {
            hdjs.video('video');
            hdjs.scrollTo('body', '#video', 1000, {queue: true});
        });
    </script>
@endpush
