@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['微信文本回复'=>'#']]) @endcomponent
    <form action="{{module_link('module.text.update',$text)}}" method="post">
        @csrf @method("PUT")
        @include('module.text._form')
    </form>
@endsection