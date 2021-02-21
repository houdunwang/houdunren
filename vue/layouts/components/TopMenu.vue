<template>
    <div class="sticky-top">
        <header class="navbar navbar-expand-md navbar-dark d-print-none">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown text-sm">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <el-image :src="user.avatar" fit="cover" class="w-8 h-8"></el-image>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ user.name }}</div>
                                <div class="mt-1 small text-muted">注册于{{ user.created_at | fromNow }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="/system/my/edit" class="dropdown-item">我的帐户</a>
                            <a href="/member" target="_blank" class="dropdown-item">会员中心</a>
                            <a href="/" target="_blank" class="dropdown-item">网站首页</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" @click="logout">退出</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center text-sm">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link :to="{ name: 'site.site.index' }" class="nav-link">
                                    <i class="fa fa-sitemap mr-1" aria-hidden="true"></i> 站点管理
                                </router-link>
                            </li>
                            <li class="nav-item" v-for="(menu, index) in menus" :key="index" v-show="user.isSuperAdmin">
                                <router-link :to="menu.route" class="nav-link">
                                    <i :class="menu.avatar" class="mr-1" aria-hidden="true"></i> {{ menu.title }}
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
const menus = [
    { title: '模块管理', route: '/system/module/index', avatar: 'fa fa-cubes' },
    { title: '系统设置', route: '/system/index', avatar: 'fas fa-comment' },
    { title: '会员组', route: '/system/group/index', avatar: 'fa fa-users' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            menus
        }
    },
    mounted() {
        //点击文档区域时隐藏右侧顶部菜单
        window.document.addEventListener('click', e => {
            if (!e.path.some(node => node == this.$refs.topMenus)) {
                this.showUserMenu = false
            }
        })
    }
}
</script>

<style></style>
