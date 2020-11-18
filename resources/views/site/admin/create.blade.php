@extends('layouts.admin.master')

@section('content')
@include('site.admin._nav')

<form action="{{ route('site.role.store',[$site]) }}" method="post">
  @csrf
  <user-search action="{{ route('site.role.search',$site) }}" v-slot="{user}" class="mt-3">
    <user-search-btn>
      <div class="btn-group btn-group-sm">
        <a :href="'/site/{{ $site['id'] }}/admin/store/'+user.id" class="btn btn-info btn-sm">设为管理员</a>
      </div>
    </user-search-btn>
  </user-search>

  <div class="card mt-3">
    <div class="card-header">
      角色设置
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($roles as $role)
        <label class="col-6 col-sm-2">
          <input type="checkbox" name="roles" value="{{ $role['id'] }}"
                 {{isset($user) &&  $user->roles->contains($role)?'checked':'' }}>
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

@endsection
