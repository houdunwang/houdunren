@extends('layouts.admin.master')

@section('content')
<div class="mb-5 mt-3">
  <h6 class="mb-3 pl-3 bl-5">应用扩展</h6>
  <section class="d-flex">
    <a href="{{ route('system.module.index') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-2x d-block fa fa-cubes" aria-hidden="true"></i>
      模块扩展
    </a>
    <a href="{{ route('system.template.index') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-life-ring fa-2x" aria-hidden="true"></i>
      模板风格
    </a>
  </section>
</div>

<div class="mb-5 mt-3">
  <h6 class="mb-3 pl-3 bl-5">用户管理</h6>
  <section class="d-flex flex-wrap">

    <a href="{{ route('system.my.edit') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3 mr-3 mb-2">
      <i class="fa fa-2x d-block fa-briefcase" aria-hidden="true"></i>
      我的帐户
    </a>

    <a href="{{ route('system.group.index') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-2x d-block fa-users" aria-hidden="true"></i>
      用户组管理
    </a>

    <a href="{{ route('system.package.index') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-2x d-block fa-comments-o" aria-hidden="true"></i>
      服务套餐
    </a>

  </section>
</div>

<div class="mb-5 mt-3">
  <h6 class="mb-3 pl-3 bl-5">系统管理</h6>
  <section class="d-flex">
    <a href="{{ route('site.site.index') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-2x d-block fa-sitemap" aria-hidden="true"></i>
      站点列表
    </a>
    <a href="{{ route('system.config.edit') }}"
       class="text-dark system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3 mb-2">
      <i class="fa fa-2x d-block fa-tachometer" aria-hidden="true"></i>
      系统配置
    </a>
  </section>
</div>
@endsection
