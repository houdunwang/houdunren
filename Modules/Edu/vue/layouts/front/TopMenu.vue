<template>
    <header class="navbar navbar-expand-md navbar-light d-print-none shadow border-t-4 border-hd">
        <div class="container-xl flex items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <router-link to="/" class="text-hd hover:text-hd text-semibold text-xl">
                    <i class="fas fa-code"></i>
                    {{ site.title }}
                </router-link>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" aria-expanded="false">
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum,
                                natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <el-image :src="user.avatar" fit="cover" class="w-8 h-8"></el-image>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ user.name }}</div>
                            <div class="mt-1 small text-muted">注册于{{ Auth.user().created_at | fromNow }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="/system/my/edit" class="dropdown-item">我的帐户</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" @click="logout">退出</a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="(menu, index) in menus" :key="index">
                            <router-link class="nav-link text-gray-500 font-semibold hover:text-hd" :to="{ name: menu.name }">
                                <span class="nav-link-title">
                                    {{ menu.title }}
                                </span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
const menus = [
    { title: '系统学习', name: '' },
    { title: '实战课程', name: '' },
    { title: '最近更新', name: '' },
    { title: '话题讨论', name: '' },
    { title: '签到打卡', name: '' },
    { title: '订阅会员', name: '' }
]
export default {
    data() {
        return {
            menus
        }
    }
}
</script>

<style></style>
