@extends('layouts.wechat')

@section('content')

@include('wechat.user.nav')
<div class="alert alert-info" role="alert">
  <i class="fas fa-info-circle"></i> 通过站点中的微信公众号管理来同步粉丝数据到服务器
</div>

<div class="input-group">
  <select name="id" class="custom-select" onchange="location.href='{{route('wechat.user.index')}}/'+this.value">
    @foreach (site()->wechats as $wx)
    <option value="{{$wx['id']}}" {{ $wx['id']==$wechat['id']?'selected':'' }}>{{ $wx['title']}}</option>
    @endforeach
  </select>
</div>

<hr>

<div class="row">
  @foreach ($users as $user)
  <div class="col-6 col-sm-3 mb-3">
    <div class="card shadow-sm">
      <div class="card-body d-flex justify-content-center flex-column align-items-center">
        <img src="{{$user->headimgurl}}" class="border rounded-sm shadow-sm mb-2" style="width: 80px;height:80px;">
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
