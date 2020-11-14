@extends('layouts.admin')

@section('content')
@include('menu._nav')
<site-menu :id="{{ $site['id'] }}" :id="{{ $site['id'] }}" />
@endsection
