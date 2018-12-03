@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header text-secondary">
            关注列表
        </div>
        <div class="card-body">
            @if($follows->count()==0)
                <p class="text-center text-muted p-5">暂无数据</p>
            @endif
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($follows as $follow)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col-auto pr-1">
                                <a href="{{route('member.user.show',$follow)}}">
                                    <img src="{{$follow->icon}}" class="u-avatar u-sm-avatar--bordered rounded">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h6 class="card-title mb-1 name">
                                    <a href="{{route('member.user.show',$follow)}}" class="text-dark">
                                        {{$follow->name}}
                                    </a>
                                </h6>
                                <p class="card-text text-muted">
                                    <span class="fe fe-clock"></span> 注册时间 {{$follow->created_at}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{$follows->links()}}
@endsection
