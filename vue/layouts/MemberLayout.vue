<template>
    <div>
        <header class="navbar navbar-expand-md navbar-light d-print-none border-hd border-t-4 shadow">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="/" class="font-weight-lighter text-gray-600"> <i class="fas fa-home"></i> {{ site.title }} </a>
                </h1>
                <!-- 用户头像菜单 -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <el-image :src="user.avatar" fit="cover" class="w-8 h-8"></el-image>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ user.name }}</div>
                                <div class="mt-1 small text-muted">注册于{{ user.created_at | fromNow }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="/" class="dropdown-item">网站首页</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" @click="logout">退出</a>
                        </div>
                    </div>
                </div>
                <!-- 用户头像菜单END -->
                <!-- 顶部模块列表 -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" v-for="(module, index) in modules" :key="index">
                                <a :href="`/${module.name}`" class="nav-link text-base font-weight-lighter text-gray-700 hover:text-hd">
                                    {{ module.title }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- 顶部模块列表END -->
            </div>
        </header>

        <div class="container-xl mt-3 md:flex">
            <member-menu />
            <div class="md:w-10/12 md:ml-2 bg-white">
                <keep-alive>
                    <router-view v-if="$route.meta.keepAlive"></router-view>
                </keep-alive>
                <router-view v-if="!$route.meta.keepAlive"></router-view>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            modules: []
        }
    },
    async created() {
        this.modules = await axios.get(`module/site/${this.site.id}`)
    }
}
</script>

<style></style>
