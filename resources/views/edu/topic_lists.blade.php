@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action rounded-0">
                        <span class="text-muted font-weight-bold btn">{{$category['title']}}</span>

                        <a href="{{route('edu.topic.create',['id'=>$category])}}"
                           class="btn u-btn-primary--air transition-3d-hover mb-1 float-right btn-xs">
                            <i class="fa fa-plus" aria-hidden="true"></i> 发表
                        </a>
                    </div>
                    @foreach($topics as $topic)
                        <div class="list-group-item list-group-item-action u-info-v1 p-3 rounded-0 justify-content-sm-between align-items-sm-center">
                            <div class="row">
                                <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                                    <img class="u-avatar rounded-circle mr-3" src="{{$topic->user->icon}}">
                                    <a href="{{route('member.user.show',$topic->user)}}" class="text-secondary">
                                        {{$topic->user->name}}
                                    </a>
                                    <a href="{{route('edu.topic.show',$topic)}}" class="text-dark">
                                        {{$topic['title']}}
                                    </a>
                                </div>
                                <span class="col-sm-2 text-text text-sm-right small text-secondary">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{$topic->created_at->diffForHumans()}}
                                        </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    {{$topics->appends(['id'=>Request::query('id')])->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
