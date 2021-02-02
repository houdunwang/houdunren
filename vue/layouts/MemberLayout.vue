<template>
    <div>
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="/"> <i class="fas fa-home"></i> 后盾人 </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                            </svg>
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
                            <el-image :src="Auth.user().avatar" fit="cover" class="w-8 h-8"></el-image>

                            <div class="d-none d-xl-block ps-2">
                                <div>{{ user.name }}</div>
                                <div class="mt-1 small text-muted">注册于{{ Auth.user().created_at | fromNow }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="/" class="dropdown-item">网站首页</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" @click="logout">退出</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl mt-3 md:flex">
            <div class="md:w-2/12 mb-2">
                <div class="border bg-white hidden md:block">
                    <img :src="Auth.user().avatar" class="w-full object-cover cursor-pointer" @click="$router.push({ name: 'member.info.avatar' })" />
                    <div class="text-gray-800 mx-3 py-4  border-b border-gray-200">{{ user.name }}</div>
                    <div class="my-4 mx-3 flex justify-between text-gray-500">
                        <i class="fa fa-envelope" :class="{ 'text-info': user.email }"></i>
                        <i class="fas fa-phone" :class="{ 'text-info': user.mobile }"></i>
                        <i class="fab fa-weibo" :class="{ 'text-info': user.weibo }"></i>
                        <i class="fab fa-weixin" :class="{ 'text-info': user.wechat }"></i>
                        <i class="fab fa-github" :class="{ 'text-info': user.github }"></i>
                        <i class="fab fa-qq" :class="{ 'text-info': user.qq }"></i>
                    </div>
                </div>

                <div class="mt-3 border bg-white">
                    <div v-for="(menu, index) in menus" :key="index" class="border-b border-gray-200">
                        <router-link
                            :to="menu.to"
                            class="text-gray-500 block py-3 px-3 pl-3 hover:bg-gray-100"
                            :class="{ 'bg-gray-100 text-gray-800': menu.to.name == $route.name }"
                        >
                            <i :class="menu.icon" class="w-4 inline-block"></i> {{ menu.title }}
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="md:w-10/12 md:ml-2 bg-white">
                <router-view />
            </div>
        </div>
    </div>
</template>
<script>
const menus = [
    { title: '基本信息', to: { name: 'member.info.base' }, icon: 'fas fa-server' },
    { title: '修改头像', to: { name: 'member.info.avatar' }, icon: 'fas fa-camera-retro' },
    { title: '密码修改', to: { name: 'member.info.password' }, icon: 'fas fa-unlock-alt' },
    { title: '手机绑定', to: { name: 'member.info.mobile' }, icon: 'fas fa-phone-square-alt' },
    { title: '绑定邮箱', to: { name: 'member.info.email' }, icon: 'fas fa-envelope' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return { menus }
    },
    methods: {
        logout() {
            this.removeToken()
            location.href = '/'
        }
    }
}
</script>

<style></style>
