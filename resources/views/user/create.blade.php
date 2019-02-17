@extends('layouts.admin')
@section('content')
    <form action="{{route('user.store')}}" method="post">
        @csrf
        @include('user._form')
    </form>
@endsection