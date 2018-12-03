@extends('layouts.space')
@section('content')
    <div class="container">
        <div class="card" data-toggle="lists">
            <div class="card-header">
                <h6 class="text-secondary">
                    帖子列表
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-lg list-group-flush list my--4">
                    @foreach($topics as $topic)
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col ml--2">
                                    <h6 class="card-title mb-1 name">
                                        <a href="{{route('edu.topic.show',$topic)}}"> {{$topic['title']}}</a>
                                    </h6>
                                    <p class="card-text small mb-1">
                                        <i class="fa fa-clock-o"
                                           aria-hidden="true"></i> {{$topic['created_at']->format('Y-m-d H:i')}}
                                        <a href="http://hdcms.test/edu/topics_1.html" class="text-secondary ml-2">
                                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                                            {{$topic->category->title}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{$topics->links()}}
        </div>
    </div>
@endsection