@extends('member.layouts.space')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-8">
            @foreach($fans = $user->fans()->paginate(1) as $fan)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{route('member.user.show',$fan)}}" class="avatar avatar-lg">
                                    <img src="{{$fan['icon']}}" class="avatar-img rounded-circle">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="card-title mb-1">
                                    <a href="{{route('member.user.show',$fan)}}">{{$fan['name']}}</a>
                                </h4>
                                <p class="card-text small text-muted mb-1 mt-3">
                                    @include('member.layouts._community',$fan)
                                </p>
                                {{--<p class="card-text small">--}}
                                {{--<span class="text-success">●</span> {{$fan->fans->count()}}--}}
                                {{--</p>--}}
                            </div>
                            {{--<div class="col-auto">--}}
                            {{--<a href="{{route('member.user.show',$fan)}}" class="btn btn-sm btn-light d-none d-md-inline-block">--}}
                            {{--访问--}}
                            {{--</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-5">
                {!! $fans->links() !!}
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                粉丝数
                            </h5>
                        </div>
                        <div class="col-auto">
                            <small class="text-muted">
                                {{$user->fans()->count()}}
                            </small>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                注册时间
                            </h5>
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
@endsection