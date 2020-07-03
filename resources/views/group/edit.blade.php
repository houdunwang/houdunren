@extends('layouts.admin')

@section('content')

@include('group.nav')

<div class="table-responsive mt-3">

    <form action="{{ route("admin.group.update",$group) }}" method="post">
        @csrf
        @method('PUT')
        @include('group.form')
    </form>

</div>

@endsection
