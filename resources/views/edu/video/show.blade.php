@extends('edu.layouts.master')
@section('content')
    <div class="container mt-0">
        <div class="{{route_class()}}">
            <div class="row mb-3">
                <div class="col-12">
                    @can('view',$video->lesson)
                        @include('edu.lesson.layouts._play')
                        @else
                        @include('edu.lesson.layouts._cant_play')
                    @endcan
                </div>
            </div>
            {{--评论--}}
            <div class="row">
                <div class="col-12 col-lg-12">
                    @include('common.comment',['model'=>$video])
                </div>
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
