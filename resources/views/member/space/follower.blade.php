@extends('layouts.space')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                @if(!$user->follower()->count())
                    <div class="card mb-3">
                        <div class="card-body text-secondary">
                            <i class="fa fa-info-circle" aria-hidden="true"></i> 暂无关注
                        </div>
                    </div>
                @endif
                @foreach($follower = $user->follower()->paginate(10) as $fan)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="{{route('member.user.show',$fan)}}">
                                        <img src="{{$fan['icon']}}" class="u-avatar rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h6 class="card-title mb-0">
                                        <a href="{{route('member.user.show',$fan)}}">{{$fan['name']}}</a>
                                    </h6>
                                    <p class="card-text small text-muted mb-1 mt-1">
                                        @include('member.layouts._community',['user'=>$fan])
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-5">
                    {!! $follower->links() !!}
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col small">
                                关注数
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    {{$user->follower()->count()}}
                                </small>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col small">
                                注册时间
                            </div>
                            <div class="col-auto">
                                <time class="small text-muted" datetime="2018-10-28">
                                    {{$user['created_at']->format('Y-m-d')}}
                                </time>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col text-center">
                                @include('member.layouts._community',['user'=>$user])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection