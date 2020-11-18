@extends('layouts.admin.master')
@section('content')
@include('wechat._nav')

<table class="table table-bordered mt-3 shadow-sm">
  <thead>
    <tr>
      <th width="80">编号</th>
      <th width="300">公众号名称</th>
      <th>微信号</th>
      <th>类型</th>
      <th>API</th>
      <th width="300">操作</th>
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
      <td>{{ $site['domain'] }}/wechat/bind/{{ $wechat['id'] }}</td>
      <td>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <chat-user-sync :site_id="{{ $site['id'] }}" :wechat_id="{{ $wechat['id'] }}">同步粉丝</chat-user-sync>
          <a href="{{ route("wechat.menu.edit",[$site,$wechat]) }}" class="btn btn-outline-info">
            微信菜单
          </a>

          <a href="{{ route("wechat.default.edit",[$site,$wechat]) }}" class="btn btn-outline-success">
            默认消息
          </a>

          <a href="{{ route("wechat.wechat.edit",[$site,$wechat]) }}" class="btn btn-outline-info">编辑</a>

          <hd-btn-del action="{{ route('wechat.wechat.destroy',[$site,$wechat]) }}" class="btn btn-outline-secondary">
            删除
          </hd-btn-del>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
