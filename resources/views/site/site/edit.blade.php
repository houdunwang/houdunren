@extends('layouts.admin')
@section('content')
    <form role="form" method="post" action="{{route('site.site.update',$site)}}" class="form-horizontal">
        @csrf @method('PUT')
        @include('site.site._form')
    </form>
@endsection