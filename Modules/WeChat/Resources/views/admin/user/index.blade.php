@extends('layouts.module.master')
@section('content')
@include('wechat::admin.user.nav')
<div class="alert alert-info" role="alert">
  <i class="fas fa-info-circle"></i> 通过站点中的微信公众号管理来同步粉丝数据到服务器
</div>

<div class="input-group">
  <select name="id" class="custom-select" onchange="location.href='{{route('WeChat.admin.user.index')}}/'+this.value">
    @foreach (site()->wechats as $wx)
    <option value="{{$wx['id']}}" {{ $wx['id']==$wechat['id']?'selected':'' }}>{{ $wx['title']}}</option>
    @endforeach
  </select>
</div>
<hr>
<div class="row">
  @foreach ($users as $user)
  <div class="col-12 col-sm-2 mb-3">
    <div class="card shadow-sm">
      <div class="card-body d-flex justify-content-center flex-column align-items-center">
        <img src="{{$user->headimgurl}}" class="border mb-2 rounded-circle p-1"
             style="width: 60px;height:60px;">
        <span>
          {{ $user->city }} / {{ $user->nickname }} / {{ $user->gender }}
        </span>
      </div>
      <div class="card-footer text-muted text-center">
        <button class="btn btn-info btn-sm">备注名称</button>
        <button class="btn btn-secondary btn-sm">加入黑名单</button>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
