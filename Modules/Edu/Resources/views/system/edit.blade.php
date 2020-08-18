@extends('layouts.module')

@section('content')

@include('edu::system.nav')

<form action="{{ route('Edu.admin.system.update',$system) }}" method="post">
    @csrf
    @method('PUT')
    @include('edu::system.form')
</form>
@endsection
