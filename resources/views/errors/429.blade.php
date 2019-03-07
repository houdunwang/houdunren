@extends('errors::illustrated-layout')

@section('code', '429')
@section('title', __('Too Many Requests'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message',$exception->getMessage()?:'对不起，你向我们的服务器发出了太多的请求。')
