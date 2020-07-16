@extends('edu::layouts.space')
@section('title',$user->name.'贴子列表')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white">
        TA的贴子
    </div>
    <div class="card-body ">
        @foreach ($topics as $topic)
        @include('edu::components.topic')
        @endforeach
    </div>
    <div class="card-footer">
        {{ $topics->links() }}
    </div>
</div>
@endsection
