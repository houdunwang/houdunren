<div class="d-none d-md-block">
  <div class="quick-menu pt-5 m-3 d-flex justify-content-between align-items-end">
    <div class="logo">
      <a href="{{ route('admin') }}">
        <img src="{{ config('admin.logo') }}" alt="">
      </a>
    </div>
    <div class="menu-items d-flex justify-content-between align-items-center">
      <a href="{{ route('site.site.index') }}" class="shadow d-flex flex-column align-items-center ml-3">
        <i class="fa fa-sitemap fa-2x" aria-hidden="true"></i>
        <span>网站管理</span>
      </a>
      <a href="{{ route('system.index') }}" class="shadow d-flex flex-column align-items-center ml-3">
        <i class="fa fa-support fa-2x" aria-hidden="true"></i>
        <span>系统设置</span>
      </a>
      <a href="{{ route('auth.logout') }}" class="shadow d-flex flex-column align-items-center ml-3">
        <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
        <span>退出</span>
      </a>
    </div>
  </div>

</div>
