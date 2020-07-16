@extends('edu::layouts.space')
@section('title',$user->name.'粉丝列表')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white">
        TA的关注
    </div>
    <div class="card-body ">
        <div class="row">
            @foreach ($followers as $follower)
            <div class="col-6 col-sm-3 mb-2">
                @include('edu::components.user_rec',['user'=>$follower])
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        {{ $followers->links() }}
    </div>
</div>
@endsection
