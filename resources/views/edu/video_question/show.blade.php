@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-5 {{route_class()}}">
        <div class="alert alert-light border" role="alert">
            <small>
                你正在参加【{{$video['title']}}】的考试
            </small>
        </div>
        <form action="{{route('edu.video.question.video.update',$video)}}" method="post">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-sm-12">
                    @foreach($video['question'] as $q=>$question)
                        <div class="card mb-2">
                            <div class="card-header">
                                {{$question['title']}}
                            </div>
                            <div class="card-body">
                                @foreach($question['topics'] as $t=>$topic)
                                <div class="form-check text-secondary">
                                    <input class="form-check-input" type="checkbox" value="1"  name="topics[{{$q}}][{{$t}}]" id="topic{{$q}}{{$t}}">
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
                <button class="btn btn-primary btn-xs" type="submit">保存提交</button>
            </div>
        </form>
    </div>
@endsection