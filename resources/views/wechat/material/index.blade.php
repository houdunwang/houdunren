@extends('layouts.wechat')

@section('content')
@include('wechat.material.nav')

@include('wechat.material.layouts.'.$type)

@endsection
