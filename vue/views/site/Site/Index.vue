<template>
    <div>
        <router-link to="/site/site/create" class="mb-3 block">
            <el-button type="primary" size="medium" class="mb-3 block">
                <i class="fas fa-plus-circle"></i>
                添加网站
            </el-button>
        </router-link>
        <el-card shadow="always" :body-style="{ padding: '0 20px' }" v-for="site in sites" :key="site.id" class="mb-3 border border-gray-200 bg-opacity-50">
            <div slot="header">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        站点可用套餐:
                        <el-tag type="warning" size="mini" v-for="p in site.master.group.packages" :key="p.id" class="mr-2">
                            <router-link to="route('system.package.edit', p.id)">
                                {{ p.title }}
                            </router-link>
                        </el-tag>
                    </div>
                    <router-link to="route('site.module.index', site)" class="text-sm text-gray-900">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        扩展模块
                    </router-link>
                </div>
            </div>

            <div class="flex items-baseline py-5">
                <i class="fa fa-rss fa-3x text-gray-600 inline-block mr-2" aria-hidden="true"></i>
                <a href="#" class="text-3xl text-gray-700">{{ site.title }}</a>
            </div>

            <div class="flex flex-col md:flex-row justify-between text-sm text-gray-600 border-t border-gray-200 items-center py-3">
                <div class="text-sm text-gray-500">
                    # {{ site.id }} 创建时间: {{ site.created_at | format }} 站长: {{ site.master.name }} 所属组:
                    <router-link to="route('system.group.edit', site.master.group.id)"> {{ site.master.group.title }} </router-link>
                    <span v-if="site.module"> 默认模块: {{ site.module.title }} </span>
                </div>
                <div class="w-full md:w-auto grid md:block md:grid-cols-none grid-cols-2 items-center mt-3 md:mt-0">
                    <router-link to="site.domain" target="_blank" class="mr-2">
                        <i class="fas fa-home"></i>
                        访问首页
                    </router-link>
                    <router-link to="route('site.config.edit', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-check-circle"></i>
                        网站配置
                    </router-link>
                    <router-link to="route('wechat.site.wechat.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-comment-dollar"></i>
                        微信公众号
                    </router-link>
                    <router-link to="route('site.admin.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-user-alt"></i>
                        管理员设置
                    </router-link>
                    <router-link to="route('site.role.index', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-user-lock"></i>
                        角色管理
                    </router-link>
                    <router-link to="route('site.permission.upgrade', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-life-ring"></i>
                        更新权限表
                    </router-link>
                    <a href=" route('site.site.menu.index',$site) " class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-archive"></i>
                        菜单设置
                    </a>
                    <router-link to="route('site.site.edit', site)" class="mr-2" v-if="site.permissions.edit">
                        <i class="fas fa-pen"></i>
                        编辑
                    </router-link>
                    <a href="#" @click.prevent="del(site)" v-if="site.permissions.edit">
                        <i class="fas fa-trash"></i>
                        删除
                    </a>
                </div>
            </div>
        </el-card>
    </div>
</template>

<script>
export default {
    route: { path: '/admin' },
    props: ['user'],
    data() {
        return { sites: [] }
    },
    async created() {
        this.sites = await this.axios.get('site')
    },
    methods: {
        del(site) {
            this.$confirm('确定删除站点吗？', '提示').then(() => {
                this.axios.delete('site/site/destroy', site)
            })
        }
    }
}
</script>

<style></style>
