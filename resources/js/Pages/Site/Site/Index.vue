<template>
    <div>
        <inertia-link :href="route('site.site.create')" class="mb-3 block">
            <el-button type="primary" size="medium" class="mb-3 block">
                <i class="fas fa-plus-circle    "></i>
                添加网站</el-button
            >
        </inertia-link>
        <el-card shadow="always" :body-style="{ padding: '0 20px' }" v-for="site in sites" :key="site.id" class="mb-3 border border-gray-200">
            <div slot="header">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        站点可用套餐:
                        <el-tag type="warning" size="mini" v-for="p in site.master.group.packages" :key="p.id" class="mr-2">
                            <inertia-link :href="route('system.package.edit', p.id)">
                                {{ p.title }}
                            </inertia-link>
                        </el-tag>
                    </div>
                    <inertia-link :href="route('site.module.index', site)" class="text-sm text-gray-900">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        扩展模块
                    </inertia-link>
                </div>
            </div>

            <div class="flex items-baseline py-5">
                <i class="fa fa-rss fa-3x text-gray-600 inline-block mr-2" aria-hidden="true"></i>
                <a href="#" class="text-3xl text-gray-700">{{ site.title }}</a>
            </div>

            <div class="flex flex-col md:flex-row justify-between text-sm text-gray-600 border-t border-gray-200 items-center py-3">
                <div class="text-sm text-gray-500">
                    # {{ site.id }} 创建时间: {{ site.created_at | format }} 站长: {{ site.master.name }} 所属组:
                    <inertia-link :href="route('system.group.edit', site.master.group.id)"> {{ site.master.group.title }} </inertia-link>
                    <span v-if="site.module"> 默认模块: {{ site.module.title }} </span>
                </div>
                <div class="w-full md:w-auto grid md:block md:grid-cols-none grid-cols-2 items-center mt-3 md:mt-0">
                    <inertia-link :href="site.domain" target="_blank" class="mr-2">
                        <!-- <i aria-hidden="true" class="fa fa-home"></i> -->
                        <i class="fas fa-home    "></i>
                        访问首页
                    </inertia-link>
                    <inertia-link :href="route('site.config.edit', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-check-circle    "></i>
                        网站配置
                    </inertia-link>
                    <inertia-link :href="route('wechat.site.wechat.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-comment-dollar    "></i>
                        微信公众号
                    </inertia-link>
                    <inertia-link :href="route('site.admin.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-user-alt    "></i>
                        管理员设置
                    </inertia-link>
                    <inertia-link :href="route('site.role.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-user-lock    "></i>
                        角色管理
                    </inertia-link>
                    <inertia-link :href="route('site.permission.upgrade', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-life-ring    "></i>
                        更新权限表
                    </inertia-link>
                    <a href=" route('site.site.menu.index',$site) " class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-archive    "></i>
                        菜单设置
                    </a>
                    <inertia-link :href="route('site.site.edit', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-pen    "></i>
                        编辑
                    </inertia-link>
                    <a action="route('site.site.destroy',$site)" v-if="site.permissions.edit">
                        <i class="fas fa-trash    "></i>
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

<style></style>
