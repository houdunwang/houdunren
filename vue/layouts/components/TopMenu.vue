<template>
    <header class="navbar navbar-expand-md navbar-dark d-print-none">
        <div class="container-xl md:max-w-full">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm w-10 h-10" :style="`background-image: url(${user.icon})`"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">个人中心</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" @click.prevent="logout">退出登录</a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link to="/admin" class="nav-link"> <i class="fa fa-sitemap mr-1" aria-hidden="true"></i> 站点管理 </router-link>
                        </li>
                        <li class="nav-item" v-for="(menu, index) in menus" :key="index" v-show="user.isSuperAdmin">
                            <router-link :to="menu.route" class="nav-link">
                                <i :class="menu.icon" class="mr-1" aria-hidden="true"></i> {{ menu.title }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import { mapState } from 'vuex'
const menus = [
    { title: '模块管理', route: '/system/module/index', icon: 'fa fa-cubes' },
    { title: '系统设置', route: '/system/index', icon: 'fas fa-comment' },
    { title: '会员组', route: '/system/group/index', icon: 'fa fa-users' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            menus
        }
    },
    computed: {
        ...mapState(['user'])
    },
    mounted() {
        //点击文档区域时隐藏右侧顶部菜单
        window.document.addEventListener('click', e => {
            if (!e.path.some(node => node == this.$refs.topMenus)) {
                this.showUserMenu = false
            }
        })
    },
    methods: {
        logout() {
            window.localStorage.removeItem('token')
            location.reload(true)
        }
    }
}
</script>

<style></style>
