@extends('layouts.wechat')

@section('content')
@include('wechat.material.nav')

{{-- <form action="{{ route('wechat.material.store') }}" method="post"> --}}
@csrf
@switch($type)

@case('image')
<chat-material-image></chat-material-image>
@break
@case(2)

@break
@default

@endswitch


{{-- </form> --}}

@endsection
