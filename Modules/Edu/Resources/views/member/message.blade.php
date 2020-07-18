@extends('edu::layouts.member')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white">
        站内消息
    </div>
    <div class="card-body ">
        @foreach ($notifications as $notification)
        @include('edu::components.message')
        @endforeach
    </div>
    <div class="card-footer">
        {{ $notifications->links() }}
    </div>
</div>

@endsection
