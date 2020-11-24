@extends('system.layouts.master')

@section('content')
@include('site.admin._nav')

@if ($roles->count())
<form action="{{ route('site.admin.role.update',[$site,$user]) }}" method="post">
  @csrf
  @method("PUT")
  <div class="card mt-3">
    <div class="card-header">
      角色设置
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($roles as $role)
        <label class="col-6 col-sm-2">
          <input type="checkbox" name="roles[]" value="{{ $role['id'] }}"
                 {{ $user->roles->contains($role)?'checked':'' }}>
          {{ $role['title'] }}
          <a href="{{ route('site.role.edit',[$site,$role]) }}" class=" text-info">
            <span class="badge badge-primary">编辑</span>
          </a>
        </label>
        @endforeach
      </div>
    </div>
  </div>

  <button class="btn btn-primary mt-3">保存</button>
</form>
@else
<div class="p-3 border text-center mt-3 text-secondary">
  <i class="fa fa-info-circle" aria-hidden="true"></i>
  请先添加 <a href="{{ route('site.role.create',$site) }}" class="font-weight-bold">站点角色</a>
</div>
@endif


@endsection
