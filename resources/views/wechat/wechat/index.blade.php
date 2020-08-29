@extends('layouts.admin')

@section('content')
@include('wechat.nav')

<table class="table table-bordered shadow-sm">
    <thead>
        <tr>
            <th>编号</th>
            <th>微信号</th>
            <th>公众号名称</th>
            <th>公众号介绍</th>
            <th>类型</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wechats as $wechat)
        <tr>
            <td width="80"> {{ $wechat->id }}</td>
            <td width="120"> {{ $wechat->name }}</td>
            <td width="300"> {{ $wechat->title }}</td>
            <td width="300"> {{ $wechat->introduce }}</td>
            <td>
                @if ($wechat->type==='subscribe')
                订阅号
                @else
                服务号
                @endif
            </td>
            <td width="230">
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('wechat.wechat.menu.edit',[$site,$wechat]) }}"
                        class="btn btn-outline-success">微信菜单</a>
                    <a href="{{ route('wechat.wechat.default.edit',[$site,$wechat]) }}"
                        class="btn btn-outline-info">默认消息</a>
                    <a href="{{ route('wechat.wechat.edit',[$site,$wechat]) }}" class="btn btn-outline-info">编辑</a>
                    <btn-del action="{{ route('wechat.wechat.destroy',[$site,$wechat]) }}"
                        class="btn btn-outline-secondary">
                    </btn-del>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
