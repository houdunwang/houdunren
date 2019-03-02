@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['桌面会员中心菜单设置'=>'#']]) @endcomponent
    <form action="{{module_link('module.menu.update',[$type,$menu])}}" method="post">
        @csrf @method('PUT')
        @include('module.menu._form')
    </form>
@endsection