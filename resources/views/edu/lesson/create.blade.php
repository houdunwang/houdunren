@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.lesson.store')}}" method="post">
        @csrf
        @include('edu.lesson._lesson')
    </form>
@endsection
