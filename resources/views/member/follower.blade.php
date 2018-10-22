@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-header-title">关注列表</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($follows->count()==0)
                <p class="text-center text-muted p-5">暂无数据</p>
            @endif
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($follows as $follow)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col-auto">
                                <a href="{{route('member.user.show',$follow)}}" class="avatar ">
                                    <img src="{{$follow->icon}}" alt="sdf" class="avatar-img rounded">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="card-title mb-3 name">
                                    <a href="{{route('member.user.show',$follow)}}">
                                        {{$follow->name}}
                                    </a>
                                </h4>
                                <p class="card-text small text-muted">
                                    <span class="fe fe-clock"></span> 注册时间 {{$follow->created_at}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
