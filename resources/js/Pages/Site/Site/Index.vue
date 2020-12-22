<template>
    <div>
        <inertia-link :href="route('site.site.create')" class="mb-3 block">
            <el-button type="primary" size="medium" class="mb-3 block">
                <i class="fa fa-plus" aria-hidden="true"></i> 添加网站</el-button
            >
        </inertia-link>
        <el-card
            shadow="always"
            :body-style="{ padding: '20px' }"
            v-for="site in sites"
            :key="site.id"
            class="mb-3 border border-gray-200"
        >
            <div slot="header">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-900">套餐: 至尊套餐</div>
                    <a href="route('site.module.index',$site) " class="text-sm text-gray-900">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        应用扩展
                    </a>
                </div>
            </div>
            <!-- card body -->
            <div class="flex items-baseline">
                <i class="fa fa-rss fa-3x mr-3 text-gray-900" aria-hidden="true"></i>
                <a href="#" class="text-3xl text-gray-900">{{ site.title }}</a>
            </div>

            <div class="flex justify-between text-sm text-gray-600 border-t border-gray-200 mt-3 pt-3">
                <div class="small mb-2"># 1 创建时间: 2020-02-03 站长: 李四 所属组: vip 默认模块: 在线教育</div>
                <div class="small">
                    <a href=" $site['domain'] " target="_blank" class="text-muted mr-2">
                        <i aria-hidden="true" class="fa fa-home"></i>
                        访问首页
                    </a>
                    <a href="/site/1/config" class="text-muted mr-2">
                        <i aria-hidden="true" class="fa fa-check-circle-o"></i>
                        网站配置
                    </a>
                    <a href=" route('wechat.wechat.index',$site) " class="text-muted mr-2"
                        ><i class="fa fa-comment-o"></i>
                        微信公众号
                    </a>
                    <a href=" route('site.admin.index',$site) " class="text-muted mr-2"
                        ><i class="fa fa-user-circle-o"></i>
                        管理员设置
                    </a>
                    <a href=" route('site.role.index',$site) " class="text-muted mr-2">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                        角色管理
                    </a>
                    <a href=" route('site.site.menu.index',$site) " class="text-muted mr-2">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                        菜单设置
                    </a>
                    <a href=" route('site.site.edit',$site) " class="text-muted mr-2">
                        <i class="fa fa-pencil-square-o"></i>
                        编辑
                    </a>

                    <a action=" route('site.site.destroy',$site) " class-name="text-muted">
                        <i class="fa fa-trash"></i>
                        删除
                    </a>
                </div>
            </div>
        </el-card>
    </div>
</template>

<script>
export default {
    props: ['sites']
}
</script>

<style>
body {
    /* color: red !important; */
}
</style>
