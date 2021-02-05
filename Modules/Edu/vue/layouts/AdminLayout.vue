<template>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark flex justify-start mt-3 text-xl font-thin">
                    <a href=".">
                        <i class="fas fa-burn mr-2"></i>
                        {{ module.title }}
                        <!-- <img src="" width="110" height="32" alt="Tabler" class="navbar-brand-image" /> -->
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <el-image :src="Auth.user().avatar" fit="cover" class="w-8 h-8"></el-image>
                            <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna!!</div>
                                <div class="mt-1 small text-muted">UI Designer</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Set status</a>
                            <a href="#" class="dropdown-item">Profile &amp; account</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item dropdown" v-for="(menu, index) in menus" :key="index">
                            <a class="nav-link dropdown-toggle show" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="true">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i :class="menu.icon"></i>
                                </span>
                                <span class="nav-link-title">
                                    {{ menu.title }}
                                </span>
                            </a>
                            <div class="dropdown-menu show">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <router-link :to="item.route" class="dropdown-item" v-for="(item, i) in menu.items" :key="i">
                                            {{ item.title }}
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl" style="max-width:100%;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <el-image :src="Auth.user().avatar" fit="cover" class="w-8 h-8"></el-image>
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
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"
                                        ><svg
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
                                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        网站首页
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/member">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 11l2 2l4 -4" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        会员中心
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/site/site/index">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="3" y="3" width="6" height="6" rx="1" />
                                            <rect x="15" y="15" width="6" height="6" rx="1" />
                                            <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3" />
                                            <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        我的站点
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                            <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        模块集
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column grid grid-cols-2 w-80">
                                            <a
                                                class="dropdown-item"
                                                :href="`/${module.name}/admin?module=${module.name}`"
                                                v-for="module in modules"
                                                :key="module.id"
                                            >
                                                {{ module.title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="p-5">
                <router-view />
            </div>
        </div>
    </div>
</template>

<script>
import menus from '../config/menus'
export default {
    data() {
        return {
            menus,
            // module: this.$store.state.module,
            modules: []
        }
    },
    async created() {
        // this.module = await this.axios.get(`/api/admin/module`)
        this.modules = await this.axios.get(`/module/site/${this.site.id}/user/${this.user.id}`)
    }
}
</script>

<style></style>
