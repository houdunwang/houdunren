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
<div class="container mt-sm-3 mb-5">
    <div class="row">
        <div class="col-12 col-sm-9 p-0">
            <div class="bg-white p-sm-3 p-3 rounded shadow-sm border border-gary shadow-sm">
                @yield('content')
            </div>
        </div>
        <div class="col-sm-3 col-12 p-0 pl-sm-2">
            @include('components.user',['user'=>$user])
            @include('user.layouts.menu',['user'=>$user])
        </div>
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
</body>
</html>