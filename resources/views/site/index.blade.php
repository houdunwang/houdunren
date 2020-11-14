@extends('layouts.admin')

@section('content')
<div>
  <a href="{{ route('site.site.create') }}" class="btn btn-info mb-3">
    <i class="fa fa-plus" aria-hidden="true"></i> 添加网站
  </a>
  @foreach($sites as $site)
  <div class="card mb-3 shadow-sm">
    <div class="card-header d-flex justify-content-between">
      <div class="small text-secondary">
        套餐:
        @foreach (user()->group->packages as $package)
        <span class="">{{ $package['title'] }}</span>
        @endforeach

        @if (auth()->id()==1)
        你是超级管理员
        @endif
      </div>
      <a href="{{ route('site.module.index',$site) }}" class="font-weight-bold text-secondary">
        <i class=" fa fa-cog" aria-hidden="true"></i> 应用扩展
      </a>
    </div>
    <div class="card-body">
      <i class="fa fa-rss fa-3x mr-3" aria-hidden="true"></i>
      <a href="{{ route('site.module.index',$site) }}" class="h3">{{ $site['title'] }}</a>
    </div>

    <div class="card-footer text-muted d-flex flex-column flex-sm-row justify-content-between align-items-center">
      <div class="small">
        <span class="mr-2">创建时间: {{ $site['created_at'] }}</span>
        <span class="mr-2">站长: {{ $site->master->name }}</span>
        <span class="mr-2">会员组: {{ $site->master->group->title }}</span>

        @if($site->module)
        <span class="mr-2">默认模块: {{ $site->module->title }}</span>
        @endif

      </div>
      <div class="small">
        @if($site->module)
        <a href="{{ $site->domain }}" target="_blank" class="text-muted mr-2">
          <i aria-hidden="true" class="fa fa-home"></i> 访问首页
        </a>
        @endif

        @can('update', $site)
        <a href="{{ route('site.config.edit',$site) }}" class="text-muted mr-2">
          <i aria-hidden="true" class="fa fa-check-circle-o"></i> 网站配置
        </a>
        <a href="{{ route('wechat.wechat.index',$site) }}" class="text-muted mr-2">
          <i class="fa fa-comment-o"></i> 微信公众号
        </a>
        <a href="{{ route('site.admin.index',$site) }}" class="text-muted mr-2">
          <i class="fa fa-user-circle-o"></i> 管理员设置
        </a>
        <a href="{{ route('site.role.index',$site) }}" class="text-muted mr-2">
          <i class="fa fa-user-secret" aria-hidden="true"></i> 角色管理
        </a>
        <a href="{{ route('site.menu.index',$site) }}" class="text-muted mr-2">
          <i class="fa fa-file-text-o" aria-hidden="true"></i> 站点菜单
        </a>
        <a href="{{ route('site.site.edit',$site) }}" class="text-muted mr-2">
          <i class="fa fa-pencil-square-o"></i> 编辑
        </a>
        <btn-del action="{{ route('site.site.destroy',$site) }}" class-name="text-muted mr-2">
          <i class="fa fa-trash"></i> 删除
        </btn-del>
        @endcan

      </div>
    </div>
  </div>
  @endforeach

  @unless ($sites->count())
  <div class="card">

    <div class="card-body">
      <strong>
        <i class="fa fa-info-circle" aria-hidden="true"></i> 暂无站点
      </strong>
    </div>

  </div>
  @endunless
</div>
@endsection
