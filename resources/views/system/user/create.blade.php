@extends('layouts.admin')
@section('content')
    <form action="{{route('system.user.store')}}" method="post">
        @csrf
        @include('system.user._form')
    </form>
@endsection