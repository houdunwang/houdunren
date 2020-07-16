@extends('edu::layouts.front')

@section('content')

<form action="{{ route('Edu.front.topic.store') }}" method="post">
    @csrf
    @include('edu::topic.form')
</form>
@endsection
