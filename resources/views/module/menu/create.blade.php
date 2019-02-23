@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['桌面会员中心菜单设置'=>'#']]) @endcomponent
    <form action="{{route('module.menu.store',['type'=>request()->query('type')])}}" method="post">
        @csrf
        @include('module.menu._form')
    </form>
@endsection