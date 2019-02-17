@extends('layouts.admin')
@section('content')
    <form role="form" method="post" action="{{route('site.update',$site)}}" class="form-horizontal">
        @csrf @method('PUT')
        @include('site._form')
    </form>
@endsection