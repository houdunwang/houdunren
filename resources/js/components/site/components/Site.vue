<template>
    <div class="card mb-3 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-6">套餐</div>
                <div class="col-6 text-right">
                    <i class="fas fa-cog"></i> 管理站点
                </div>
            </div>
        </div>
        <div class="card-body text-dark">
            <i class="fas fa-rss fa-3x mr-3"></i>
            <span class="h3">后盾人</span>
        </div>
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col-6 small">
                    到期时间 : 站长 : 我是大强211
                </div>
                <div class="col-md-6 text-right small">
                    <a href="" class="text-muted mr-2">
                        <i class="fa fa-key"></i> 网站配置
                    </a>
                    <a href="" class="text-muted mr-2">
                        <i class="fa fa-key"></i> 站点模块
                    </a>
                    <a href="" class="text-muted mr-2">
                        <i class="fa fa-comment-o"></i> 微信公众号
                    </a>
                    <a href="" class="text-muted mr-2">
                        <i class="fa fa-user"></i> 操作员管理
                    </a>
                    <a
                        href="https://www.houdunren.com/system/site/18/edit"
                        class="text-muted mr-2"
                    >
                        <i class="fa fa-pencil-square-o"></i> 编辑
                    </a>
                    <a
                        href="javascript:void(0)"
                        onclick="destroy(this)"
                        class="text-muted"
                    >
                        <i class="fa fa-trash"></i> 删除
                    </a>
                    <form
                        action="https://www.houdunren.com/system/site/18"
                        method="post"
                    >
                        <input
                            type="hidden"
                            name="_token"
                            value="zh1uCEa2rJVLmWWyziLdbmy85fcABc12nOjHEPyU"
                        />
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
