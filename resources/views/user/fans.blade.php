@extends('user.layouts.master')
@section('content')
    <h5>
        <i class="fa fa-video-camera"></i> TA的粉丝
    </h5>
    <hr>
    <div class="row follower">
        @if (count($users))
            @foreach($users as $u)
                <div class="col-sm-4 col-6">
                    @include('components.user',['user'=>$u])
                </div>
            @endforeach
        @else
            <div class="col-12 text-center p-3 text-secondary">
                <i class="fa fa-info-circle"></i> 还没有粉丝发现这个高手
            </div>
        @endif

    </div>
    <div class="pt-3">
        {{$users->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection