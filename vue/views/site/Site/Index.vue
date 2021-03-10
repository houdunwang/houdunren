<template>
    <div>
        <el-button type="primary" size="medium" class="mb-3 block" @click="$router.push({ name: 'site.site.create' })">
            <i class="fas fa-plus-circle"></i>
            添加网站
        </el-button>
        <div style="min-height:100px;" v-loading="loading">
            <div v-if="sites.length">
                <div class="card shadow-sm mb-3 text-gray-800" v-for="site in sites" :key="site.id">
                    <div class="card-header flex justify-between text-sm text-gray-600">
                        <div>
                            站点可用模块:
                            <span v-for="p in site.master.group.packages" :key="p.id">
                                <el-tag size="mini" v-for="module in p.modules" :key="module.id" class="mr-1">
                                    {{ module.title }}
                                </el-tag>
                            </span>
                        </div>
                        <router-link :to="{ name: 'site.module.index', params: { sid: site.id } }" class="text-gray-600 hover:text-gray-900">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            扩展模块
                        </router-link>
                    </div>
                    <div class="card-body text-gray-500 hover:text-gray-800 duration-300">
                        <router-link
                            :to="{ name: 'site.module.index', params: { sid: site.id } }"
                            class="text-3xl text-gray-500 duration-300 hover:text-gray-800"
                        >
                            <i class="fa fa-rss text-5xl inline-block mr-2" aria-hidden="true"></i>
                            {{ site.title }}
                        </router-link>
                    </div>
                    <div class="card-footer text-sm text-gray-500 bg-white flex flex-col md:flex-row justify-between">
                        <div class="text-sm ">
                            # {{ site.id }} 创建时间: {{ site.created_at | format }} 站长: {{ site.master.name }} 所属组:
                            <router-link :to="{ name: 'system.group.index' }" v-if="user.isSuperAdmin" class=" text-gray-500 duration-300 hover:text-gray-900">
                                {{ site.master.group.title }}
                            </router-link>
                            <span v-else>{{ site.master.group.title }}</span>
                            <span v-if="site.module"> 默认模块: {{ site.module.title }} </span>
                        </div>
                        <div class="site-menu w-full md:w-auto grid md:block md:grid-cols-none grid-cols-2 items-center mt-3 md:mt-0">
                            <a :href="site.domain" target="_blank" class="mr-2 text-gray-500 duration-300 hover:text-gray-900">
                                <i class="fas fa-home"></i>
                                访问首页
                            </a>
                            <a :href="`${site.domain}/member`" target="_blank" class="mr-2 text-gray-500 duration-300 hover:text-gray-900">
                                <i class="fas fa-user-circle"></i>
                                会员中心
                            </a>
                            <router-link
                                v-for="(menu, index) in menus"
                                :key="index"
                                :to="{ name: menu.name, params: { sid: site.id } }"
                                class="mr-2 text-gray-500 duration-300 hover:text-gray-900"
                            >
                                <i :class="menu.icon"></i>
                                {{ menu.title }}
                            </router-link>
                            <a href="#" @click.prevent="syncPermission(site)" class="mr-2 text-gray-500 duration-300 hover:text-gray-900">
                                <i class="fas fa-life-ring"></i>
                                更新权限表
                            </a>
                            <router-link
                                :to="{ name: 'site.site.edit', params: { id: site.id } }"
                                v-if="site.permissions.update"
                                class="mr-2 text-gray-500 duration-300 hover:text-gray-900"
                            >
                                <i class="fas fa-pen"></i>
                                编辑站点
                            </router-link>
                            <a href="#" @click.prevent="del(site)" v-if="site.permissions.delete" class="mr-2 text-gray-500 duration-300 hover:text-gray-900">
                                <i class="fas fa-trash"></i>
                                删除
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!loading && sites.length == 0" class="text-center text-base text-gray-600 flex items-center justify-center">
                <i class="fas fa-info-circle"></i> 先添加个站点吧
            </div>
        </div>
    </div>
</template>

<script>
const menus = [
    { title: '网站配置', name: `site.config.edit`, icon: 'fas fa-check-circle' },
    { title: '微信公众号', name: `wechat.wechat.index`, icon: 'fas fa-comment-dollar' },
    { title: '管理员设置', name: `site.admin.index`, icon: 'fas fa-user-alt' },
    { title: '角色管理', name: `site.role.index`, icon: 'fas fa-user-lock' }
]
export default {
    data() {
        return { sites: [], menus, loading: true }
    },
    async created() {
        this.sites = await this.axios.get('site')
        this.loading = false
    },
    methods: {
        async del(site) {
            this.$confirm('确定删除站点吗？', '提示').then(async _ => {
                await this.axios.delete(`site/${site.id}`, site)
                this.sites.splice(this.sites.indexOf(site), 1)
            })
        },
        async syncPermission(site) {
            await this.axios.get(`site/${site.id}/permission/sync`)
        }
    }
}
</script>

<style></style>
