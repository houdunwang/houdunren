@extends('edu::layouts.space')
@section('title',$user->name.'粉丝列表')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white">
        TA的关注
    </div>
    <div class="card-body ">
        <div class="row">
            @forelse ($followers as $follower)
            <div class="col-6 col-sm-3 mb-2">
                @include('edu::components.user_small',['user'=>$follower])
            </div>
            @empty
            <div class="text-center col-12 p-3 text-secondary">
                <a href="{{ route('common.follower',$user) }}" data-container="body" data-toggle="popover"
                    data-placement="top" data-trigger="hover" data-original-title="" title=""
                    class="btn btn-sm {{ $user->isFans?'btn-success':'btn-outline-success' }}">
                    <i class="fa fa-plus"></i>
                    关注 TA 成为第一个粉丝
                </a>
            </div>
            @endforelse
        </div>
    </div>
    @if ($followers->total()>1)
    <div class="card-footer">
        @include('edu::layouts.paginate',['data'=>$followers])
    </div>
    @endif
</div>
@endsection
