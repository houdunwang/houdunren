@extends('user.layouts.master')
@section('content')
    <form action="{{route('edu.lesson.store')}}" method="post" id="app">
        @csrf
        @include('edu.layouts._lesson')
    </form>
@endsection
@push('js')
    <script>
        {{--require(['{{asset('js/lesson.js')}}'])--}}
        require(['vue', 'hdjs', 'jquery'], function (Vue, hdjs, $) {
            vu = new Vue({
                el: "#app",
                data: {
                    field: {!! old('field',json_encode($field)) !!},
                },
                methods: {
                    addVideo() {
                        this.field.videos.push({title: '', path: '', duration: 0})
                    },
                    delVideo(index) {
                        this.field.videos.splice(index, 1)
                    },
                    uploadLessonThumb() {
                        hdjs.image((images) => {
                            this.field.lesson.thumb = images[0];
                        }, {})
                    }
                }
            })
        })
    </script>
@endpush
