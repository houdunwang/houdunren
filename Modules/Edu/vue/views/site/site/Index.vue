<template>
    <div>
        <router-link to="/site/site/create" class="mb-3 block">
            <el-button type="primary" size="medium" class="mb-3 block">
                <i class="fas fa-plus-circle"></i>
                添加网站
            </el-button>
        </router-link>
        <div style="min-height:100px;" v-loading="loading">
            <div class="card shadow-sm mb-3 text-gray-800" v-for="site in sites" :key="site.id">
                <div class="card-header flex justify-between">
                    <div>站点可用套餐:</div>
                    <router-link to="route('site.module.index', site)" class="text-sm text-gray-900">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        扩展模块
                    </router-link>
                </div>
                <div class="card-body text-gray-500 hover:text-gray-800 duration-300">
                    <i class="fa fa-rss fa-3x inline-block mr-2" aria-hidden="true"></i>
                    <a href="#" class="text-3xl">{{ site.title }}</a>
                </div>
                <div class="card-footer text-muted bg-white flex flex-col md:flex-row justify-between">
                    <div class="text-sm text-gray-500">
                        # {{ site.id }} 创建时间: {{ site.created_at | format }} 站长: {{ site.master.name }} 所属组:
                        <router-link to="route('system.group.edit', site.master.group.id)"> {{ site.master.group.title }} </router-link>
                        <span v-if="site.module"> 默认模块: {{ site.module.title }} </span>
                    </div>
                    <div class="site-menu w-full md:w-auto grid md:block md:grid-cols-none grid-cols-2 items-center mt-3 md:mt-0">
                        <a href="/" target="_blank">
                            <i class="fas fa-home"></i>
                            访问首页
                        </a>
                        <router-link v-for="(menu, index) in menus" :key="index" :to="menu.to" class="mr-2 text-gray-500 text-sm">
                            <i :class="menu.icon"></i>
                            {{ menu.title }}
                        </router-link>
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
    </div>
</template>

<script>
const menus = [
    { title: '网站配置', to: '', icon: 'fas fa-check-circle' },
    { title: '微信公众号', to: '', icon: 'fas fa-comment-dollar' },
    { title: '管理员设置', to: '', icon: 'fas fa-user-alt' },
    { title: '角色管理', to: '', icon: 'fas fa-user-lock' },
    { title: '更新权限表', to: '', icon: 'fas fa-life-ring' },
    { title: '菜单设置', to: '', icon: 'fas fa-archive' }
]
export default {
    route: { path: '/admin' },
    props: ['user'],
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
        }
    }
}
</script>

<style></style>
