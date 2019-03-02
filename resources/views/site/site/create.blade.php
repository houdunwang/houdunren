@extends('layouts.system')
@section('content')
    <form role="form" method="post" action="{{route('site.site.store')}}" class="form-horizontal">
        @csrf
        @include('site.site._form')
    </form>
@endsection