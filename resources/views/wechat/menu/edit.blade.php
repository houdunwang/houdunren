@extends('layouts.admin')

@section('content')
@include('wechat.nav')
<div class="card">
    <div class="card-header">
        微信菜单
    </div>
    <div class="card-body">
        <div class="wechat-menu">
            <div class="view">
                <header>
                    <img src="/images/wechat_header.jpg" />
                </header>
                <footer>
                    <dl>
                        <dt>a</dt>
                        <dd>b</dd>
                        <dd>c</dd>
                        <dd>c</dd>
                    </dl>
                    <dl>
                        <dt>a</dt>
                        <dd>b</dd>
                        <dd>c</dd>
                        <dd>b</dd>
                        <dd>c</dd>
                    </dl>
                    <dl>
                        <dt>a</dt>
                        <dd>b</dd>
                        <dd>c</dd>
                    </dl>
                </footer>
            </div>
            <div class="edit"></div>
        </div>
    </div>
</div>
<button class="btn btn-primary mt-3">保存菜单</button>
@endsection
