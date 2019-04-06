<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>欢迎来到【{{$user['name']}}】的主页</title>
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="member">
@include('layouts.message')
@include('components.header')
<div class="container mt-3 mb-5 p-0 p-sm-1">
    <div class="row">
        <div class="col-12 col-sm-9">
            <div class="bg-white border rounded p-3 shadow-sm">
                @yield('content')
            </div>
        </div>
        <div class="col-sm-3 col-12 p-0 pt-2 p-sm-0">
            @include('components.user',['user'=>$user])
            @include('user.layouts.menu',['user'=>$user])
        </div>
    </div>
</div>
<script>
    require(['bootstrap'], function () {
        $(function () {
            $('[data-toggle="popover"]').popover({
                // trigger: 'hover'
            })
        });
    });
</script>
@stack('js')
</body>
</html>