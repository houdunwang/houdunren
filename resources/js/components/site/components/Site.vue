<template>
  <div class="card mb-3 shadow-sm">
    <div class="card-header">
      <div class="row">
        <div class="col-6">套餐</div>
        <div class="col-6 text-right">
          <i class="fa fa-cog"></i> 管理站点
        </div>
      </div>
    </div>
    <div class="card-body text-dark d-flex align-items-center">
      <i class="fa fa-rss fa-3x mr-3"></i>
      <span class="h4">后盾人</span>
    </div>
    <div class="card-footer text-muted">
      <div class="d-flex flex-md-row flex-column justify-content-between">
        <div class="small">到期时间 : 站长 : 我是大强</div>
        <div class="lin"></div>
        <div class="small">
          <a href class="text-muted mr-2">
            <i class="fa fa-key"></i> 网站配置
          </a>
          <a href class="text-muted mr-2">
            <i class="fa fa-key"></i> 站点模块
          </a>
          <a href class="text-muted mr-2">
            <i class="fa fa-comment-o"></i> 微信公众号
          </a>
          <a href class="text-muted mr-2">
            <i class="fa fa-user"></i> 操作员管理
          </a>
          <a href="https://www.houdunren.com/system/site/18/edit" class="text-muted mr-2">
            <i class="fa fa-pencil-square-o"></i> 编辑
          </a>
          <a href onclick="destroy(this)" class="text-muted">
            <i class="fa fa-trash"></i> 删除
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
