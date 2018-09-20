@extends('user.layouts.space')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-header-title">粉丝列表</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($fans->count()==0)
                <p class="text-center text-muted p-5">暂无数据</p>
            @endif
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($fans as $fan)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col-auto">
                                <a href="http://dev.hdcms.com/member/user/1" class="avatar ">
                                    <img src="{{$fan->icon}}" alt="sdf" class="avatar-img rounded">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="card-title mb-3 name">
                                    <a href="{{route('member.user.show',$fan)}}">
                                        {{$fan->name}}
                                    </a>
                                </h4>
                                <p class="card-text small text-muted">
                                    <span class="fe fe-clock"></span> 注册时间 {{$fan->created_at}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
