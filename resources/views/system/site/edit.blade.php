@extends('layouts.system')
@section('content')
    <form role="form" method="post" action="{{route('system.site.update',$site)}}" class="form-horizontal">
        @csrf @method('PUT')
        @include('system.site._form')
    </form>
@endsection