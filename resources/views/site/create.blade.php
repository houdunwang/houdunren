@extends('layouts.admin')

@section('content')

@include('site.nav')

<form action="{{ route('site.site.store') }}" method="post">
    @csrf

    @include('site.form')
</form>
@endsection
