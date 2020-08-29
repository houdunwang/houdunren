@extends('layouts.admin')
@section('content')
@include('wechat.nav')

<table class="table table-bordered mt-3 shadow-sm">
    <thead>
        <tr>
            <th width="80">编号</th>
            <th width="300">公众号名称</th>
            <th>微信号</th>
            <th>类型</th>
            <th>API</th>
            <th width="250">操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wechats as $wechat)
        <tr>
            <td>
                {{ $wechat['id'] }}
            </td>
            <td> {{ $wechat['title'] }}</td>
            <td> {{ $wechat['name'] }}</td>
            <td> {{ $wechat['type'] }}</td>
            <td>{{ $site['domain'] }}/wechat/bind/{{ $site['id'] }}/{{ $wechat['id'] }}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route("wechat.wechat.menu.edit",[$site,$wechat]) }}" class="btn btn-outline-info">
                        微信菜单
                    </a>

                    <a href="{{ route("wechat.wechat.default.edit",[$site,$wechat]) }}" class="btn btn-outline-success">
                        默认消息
                    </a>

                    <a href="{{ route("wechat.wechat.edit",[$site,$wechat]) }}" class="btn btn-outline-info">编辑</a>

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
