@extends('layouts.system')
@section('content')
    <form role="form" method="post" action="{{route('system.site.store')}}" class="form-horizontal">
        @csrf
        @include('system.site._form')
    </form>
@endsection