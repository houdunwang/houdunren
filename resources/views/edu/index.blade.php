@extends('edu.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-header-title">
                                动态
                            </h4>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                    筛选
                                </a>
                                <div class="dropdown-menu ">
                                    <a class="dropdown-item sort small" data-sort="name" href="{{route('edu.home')}}">
                                        全部
                                    </a>
                                    <a class="dropdown-item sort small" data-sort="name" href="{{route('edu.home',['t'=>'follow'])}}">
                                        关注
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        @foreach($activitys as $activity)
                            @switch($activity->log_name)
                                @case('comment')
                                    @include('edu.activity._comment')
                                @break
                                @case('article')
                                    @include('edu.activity._article')
                                @break
                            @endswitch
                        @endforeach
                    </ul>
                </div>
            </div>
            {{$activitys->appends(['t'=>Request::query('t')])->links()}}
        </div>
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">
                        公告
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary"> 晚八点直播</a>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary">新手帮助</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
