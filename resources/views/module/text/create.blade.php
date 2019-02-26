@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['微信文本回复'=>'#']]) @endcomponent
    <form action="{{module_link('module.text.store')}}" method="post">
        @csrf
        @include('module.text._form')
    </form>
@endsection