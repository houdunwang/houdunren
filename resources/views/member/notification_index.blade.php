@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-header-title">
                        通知
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($notifications as $notification)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col-auto">
                                <a class="avatar" href="{{route('member.user.show',$notification['data']['user_id'])}}">
                                    <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <div class="card-title mb-2 name">
                                    <a href="{{route('member.user.show',$notification['data']['user_id'])}}" class="text-secondary">
                                        {{$notification['data']['user_name']}}
                                    </a>
                                    <span class="text-muted">回复了</span>
                                    <a href="{{route('member.notification.show',$notification)}}"  class="text-secondary">
                                        {{$notification['data']['title']}}
                                    </a>
                                </div>
                                <p class="card-text small text-muted">
                                    <i class="fe fe-clock"></i> {{$notification->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
