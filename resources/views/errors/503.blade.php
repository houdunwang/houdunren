@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('Service Unavailable'))

@section('image')
    <div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', $exception->getMessage()?:'对不起，我们正在维修。请稍后再来'))
