@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="alert alert-light border" role="alert">
            <h2>你的考试成绩 {{$result['grade']}} 分</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @foreach($video['question'] as $q=>$question)
                    <div class="card mb-3">
                        <div class="card-header">
                            @if(key_exists($q,$result['rights']))
                                <span>
                                        {{$question['title']}}
                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                   </span>
                            @else
                                <span class="text-danger">
                                        {{$question['title']}}
                                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                    </span>
                            @endif
                        </div>
                        <div class="card-body">
                            @foreach($question['topics'] as $t=>$topic)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           disabled
                                           @if(key_exists($t,$topics[$q]??[])) checked @endif>
                                    <label class="form-check-label" for="topic{{$q}}{{$t}}">
                                        {{$topic['topic']}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-3">
            <a class="btn btn-primary btn-xs" href="{{route('edu.video.question.video.show',$video)}}">重新考试</a>
            <a class="btn btn-success btn-xs" href="{{route('edu.video.show',$video)}}">学习课程</a>
            <a class="btn btn-warning btn-xs" href="{{route('edu.lesson.show',$video->lesson)}}">课程列表</a>
        </div>
    </div>
@endsection