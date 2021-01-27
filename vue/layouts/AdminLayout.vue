<template>
    <div style="background-image: url(/images/admin2.jpg)" class="min-h-screen bg-cover">
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
                            <li class="nav-item" v-for="(menu, index) in menus" :key="index">
                                <router-link :to="menu.route" class="nav-link"> <i :class="menu.icon" class="mr-1" aria-hidden="true"></i> {{ menu.title }} </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- 顶部导航 End-->
        <!-- 快速导航菜单 -->
        <div class="flex flex-col md:flex-row items-center justify-between px-4 md:py-10 py-3">
            <div class="logo hidden md:block md:w-96">
                <a href="#">
                    <img src="" />
                </a>
            </div>
            <div class="grid grid-flow-col gap-2 mt-3 md:mt-0">
                <div v-for="(menu, index) in quickMenus" :key="index">
                    <router-link
                        :to="menu.route"
                        class="bg-white border rounded-lg shadow-md box-border px-4 py-3 flex flex-col justify-center items-center opacity-75 duration-500 hover:opacity-100 w-32"
                    >
                        <i class="fa-2x" :class="menu.icon" aria-hidden="true"></i>
                        <span class="text-sm">{{ menu.title }}</span>
                    </router-link>
                </div>
            </div>
        </div>
        <!-- 快速导航菜单 End-->
        <div class="bg-white mx-3 px-5 py-4 shadow-md rounded-sm">
            <router-view />
        </div>
        <div class="mt-5 flex justify-center py-8 text-sm text-gray-900 text-center font-bold"></div>
    </div>
</template>
<script>
import { mapState } from 'vuex'
const menus = [
    { title: '站点管理', route: '/admin', icon: 'fa fa-sitemap' },
    { title: '模块管理', route: '', icon: 'fa fa-cubes' },
    { title: '系统设置', route: '', icon: 'fas fa-comment' },
    { title: '会员组', route: '', icon: 'fa fa-users' }
]
const quickMenus = [
    { title: '网站管理', route: '/admin', icon: 'fas fa-sitemap' },
    { title: '系统设置', route: '', icon: 'far fa-life-ring' },
    { title: '退出', route: '', icon: 'fas fa-sign-out-alt' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            menus,
            quickMenus
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
