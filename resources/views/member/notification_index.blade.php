@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header text-secondary">
            消息列表
        </div>
        <div class="card-body">
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($notifications as $notification)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col-auto pr-1">
                                <a href="{{route('member.user.show',$notification['data']['user_id'])}}">
                                    <img src="{{$notification['data']['user_icon']}}" class="u-avatar u-sm-avatar--bordered rounded">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <div class="card-title mb-1 name">
                                    <a href="{{route('member.user.show',$notification['data']['user_id'])}}"
                                       class="text-secondary">
                                        {{$notification['data']['user_name']}}
                                    </a>
                                    <span class="text-muted">{{$notification['data']['active']??''}}</span>
                                    <a href="{{route('member.notification.show',$notification)}}"
                                       class="text-secondary">
                                        {{$notification['data']['title']}}
                                    </a>
                                </div>
                                <p class="card-text text-muted small">
                                    <span class="fe fe-clock"></span>  {{$notification->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
