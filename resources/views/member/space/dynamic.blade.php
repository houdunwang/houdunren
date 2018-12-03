@extends('layouts.space')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                @include('layouts.dynamic',['user'=>$user])
            </div>
            <div class="col-12 col-xl-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col small">
                                粉丝数
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    {{$user->fans()->count()}}
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