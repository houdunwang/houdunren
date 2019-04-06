@extends('user.layouts.master')
@section('content')
    <h5>
        <i class="fa fa-user-circle-o"></i> TA的关注
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
                <i class="fa fa-info-circle"></i> 哈哈... TA比较含蓄，还没有关注任何人哟
            </div>
        @endif
    </div>
    <div class="pt-3">
        {{$users->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection