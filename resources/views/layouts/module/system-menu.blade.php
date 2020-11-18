<div class="row">
  <div class="col-12 col-3">
    <div class="card">
      <div class="card-header">
        系统菜单
      </div>
      <div class="card-body">
        <a href="{{ route("site.site.index") }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fab fa-weixin"></i> 站点列表
        </a>
        <a href="{{ route('site.site.edit',site()) }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fas fa-sitemap"></i> 编辑当前站点
        </a>
        <a href="{{ route("wechat.wechat.index",site()) }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fab fa-weixin"></i> 公众号管理
        </a>
        <a href="{{ route("system.package.index") }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fas fa-address-book"></i> 套餐管理
        </a>
        <a href="{{ route('site.role.index',site()) }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fas fa-layer-group"></i> 角色管理
        </a>
        <a href="{{ route('site.admin.index',site()) }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fas fa-user-alt"></i> 站点管理员
        </a>
        <a href="{{ route('site.menu.index',site()) }}" class="btn btn-outline-dark btn-sm mr-3">
          <i class="fas fa-file-archive"></i> 站点菜单
        </a>
      </div>
    </div>

  </div>
</div>
