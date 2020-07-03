@extends('layouts.admin')

@section('content')

@include('group.nav')

<div class="table-responsive mt-3">

    <form action="{{ route("admin.group.store") }}" method="post">
        @csrf

        @include('group.form')
    </form>

</div>

@endsection
