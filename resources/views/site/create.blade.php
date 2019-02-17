@extends('layouts.admin')
@section('content')
    <form role="form" method="post" action="{{route('site.store')}}" class="form-horizontal">
        @csrf
        @include('site._form')
    </form>
@endsection