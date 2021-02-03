<template>
    <div>
        <el-button type="primary" size="medium" class="mb-3 block" @click="$router.push({ name: 'site.site.create' })">
            <i class="fas fa-plus-circle"></i>
            添加网站
        </el-button>
        <div style="min-height:100px;" v-loading="loading">
            <div v-if="sites.length">
                <div class="card shadow-sm mb-3 text-gray-800" v-for="site in sites" :key="site.id">
                    <div class="card-header flex justify-between">
                        <div>站点可用套餐:</div>
                        <router-link :to="{ name: 'site.module.index', params: { sid: site.id } }" class="text-sm text-gray-900">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            扩展模块
                        </router-link>
                    </div>
                    <div class="card-body text-gray-500 hover:text-gray-800 duration-300">
                        <i class="fa fa-rss fa-3x inline-block mr-2" aria-hidden="true"></i>
                        <router-link :to="{ name: 'site.module.index', params: { sid: site.id } }" class="text-3xl">{{ site.title }}</router-link>
                    </div>
                    <div class="card-footer text-muted bg-white flex flex-col md:flex-row justify-between">
                        <div class="text-sm text-gray-500">
                            # {{ site.id }} 创建时间: {{ site.created_at | format }} 站长: {{ site.master.name }} 所属组:
                            <router-link :to="{ name: 'system.group.index' }" v-if="Auth.isSuperAdmin()"> {{ site.master.group.title }} </router-link>
                            <span v-else>{{ site.master.group.title }}</span>
                            <span v-if="site.module"> 默认模块: {{ site.module.title }} </span>
                        </div>
                        <div class="site-menu w-full md:w-auto grid md:block md:grid-cols-none grid-cols-2 items-center mt-3 md:mt-0">
                            <a href="/" target="_blank">
                                <i class="fas fa-home"></i>
                                访问首页
                            </a>
                            <router-link
                                v-for="(menu, index) in menus"
                                :key="index"
                                :to="{ name: menu.name, params: { sid: site.id } }"
                                class="mr-2 text-gray-500 text-sm"
                            >
                                <i :class="menu.icon"></i>
                                {{ menu.title }}
                            </router-link>
                            <a href="#" @click.prevent="syncPermission(site)" class="mr-2">
                                <i class="fas fa-life-ring"></i>
                                更新权限表
                            </a>
                            <router-link :to="{ name: 'site.site.edit', params: { id: site.id } }">
                                <i class="fas fa-pen"></i>
                                编辑站点
                            </router-link>
                            <a href="#" @click.prevent="del(site)" v-if="site.permission.update">
                                <i class="fas fa-trash"></i>
                                删除
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="text-center text-base text-gray-600 flex items-center justify-center"><i class="fas fa-info-circle"></i> 先添加个站点吧</div>
        </div>
    </div>
</template>

<script>
const menus = [
    { title: '网站配置', name: `site.config.edit`, icon: 'fas fa-check-circle' },
    { title: '微信公众号', name: `site.wechat.index`, icon: 'fas fa-comment-dollar' },
    { title: '管理员设置', name: `site.admin.index`, icon: 'fas fa-user-alt' },
    { title: '角色管理', name: `site.role.index`, icon: 'fas fa-user-lock' }
]
export default {
    route: { path: '/admin' },
    data() {
        return { sites: [], menus, loading: true }
    },
    async created() {
        this.sites = await this.axios.get('site')
        this.loading = false
    },
    methods: {
        async del(site) {
            try {
                await this.$confirm('确定删除站点吗？', '提示')
                await this.axios.delete(`site/${site.id}`, site)
                this.get()
            } catch (e) {}
        },
        async syncPermission(site) {
            await this.axios.get(`${site.id}/permission/sync`)
        }
    }
}
</script>

<style></style>
