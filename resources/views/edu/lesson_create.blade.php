@extends('edu.layouts.admin')
@section('content')
    <form action="{{route('edu.lesson.store')}}" method="post">
        @csrf
        @include('edu.layouts._lesson')
    </form>
@endsection
