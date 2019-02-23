@extends('layouts.admin')
@section('content')
    <form action="{{route('system.package.store')}}" method="post">
        @csrf
        @include('system.package._form')
    </form>
@endsection