@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-header-title text-secondary">
                                    {{$category['title']}}
                                </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('edu.topic.create',['id'=>$category])}}"
                                   class="btn btn-sm btn-primary">
                                    发表
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-lg list-group-flush list my--4">
                            @foreach($topics as $topic)
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="{{route('member.user.show',$topic->user)}}">
                                                <img class="u-avatar u-sm-avatar--bordered rounded-circle"
                                                     src="{{$topic->user->avatar}}">
                                            </a>
                                        </div>
                                        <div class="col ml--2">
                                            <h6 class="card-title mb-1 name">
                                                <a href="{{route('edu.topic.show',$topic)}}">{{$topic->title}}</a>
                                            </h6>
                                            <p class="card-text small text-muted mb-1">
                                                <a href="{{route('member.user.show',$topic->user)}}"
                                                   class="text-secondary mr-2 small">
                                                    <i class="fa fa-user-circle"
                                                       aria-hidden="true"></i> {{$topic->user->name}}
                                                </a>
                                                <i class="fa fa-clock-o"
                                                   aria-hidden="true"></i> {{$topic->updated_at->diffForHumans()}}
                                            </p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-group btn-group-toggle">
                                                @can('update',$topic)
                                                    <a href="{{route('edu.topic.edit',$topic)}}"
                                                       class="btn btn-xs btn-light">编辑</a>
                                                @endcan
                                                @can('delete',$topic)
                                                    <a href="javascript:;" class="btn btn-xs btn-secondary"
                                                    onclick="confirm('确定删除吗？')?$(this).next().submit():null">删除</a>
                                                        <form action="{{route('edu.topic.destroy',$topic)}}" method="post">
                                                            @csrf @method('DELETE')
                                                        </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    {{$topics->appends(['id'=>Request::query('id')])->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
