<template>
    <header class="navbar navbar-expand-md navbar-light d-print-none shadow border-t-4 border-hd sticky-top mb-10">
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
            <div class="navbar-nav flex-row order-md-last" v-if="user.id">
                <!-- 通知 -->
                <!-- <div class="nav-item dropdown d-none d-md-flex me-3">
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
                </div> -->
                <!-- 通知 end-->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <el-image :src="$store.state.user.avatar" fit="cover" class="w-8 h-8"></el-image>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ user.name }}</div>
                            <div class="mt-1 small text-muted">注册于{{ user.created_at | fromNow }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="/member" class="dropdown-item">修改资料</a>
                        <router-link :to="{ name: 'member.video' }" class="dropdown-item">学习历史</router-link>
                        <router-link :to="{ name: 'member.topic' }" class="dropdown-item">我的贴子</router-link>
                        <router-link :to="{ name: 'member.duration' }" class="dropdown-item">会员周期</router-link>
                        <router-link :to="{ name: 'member.order' }" class="dropdown-item">订单列表</router-link>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" @click.prevent="logout">退出</a>
                    </div>
                </div>
            </div>
            <div class="flex-row order-md-last flex" v-else>
                <a class="btn btn-danger mr-3" href="/login" role="button">登录</a>
                <a class="btn btn-light " href="/register" role="button">注册</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="(menu, index) in menus" :key="index">
                            <router-link
                                class="nav-link text-gray-500 font-semibold hover:text-hd"
                                :class="{ 'text-hd': $route.name == menu.name }"
                                :to="{ name: menu.name }"
                            >
                                <span class="nav-link-title">
                                    {{ menu.title }}
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle text-gray-500 font-semibold hover:text-hd"
                                href="#navbar-layout"
                                data-bs-toggle="dropdown"
                                role="button"
                                aria-expanded="false"
                            >
                                <span class="nav-link-title">
                                    在线文档
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" :href="d.to" v-for="(d, i) in docs" :key="i" target="_blank" v-show="i % 2 == 0">
                                            {{ d.title }}
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" :href="d.to" v-for="(d, i) in docs" :key="i" target="_blank" v-show="i % 2 != 0">
                                            {{ d.title }}
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
</template>

<script>
const menus = [
    { title: '系统学习', name: 'front.system.index' },
    { title: '实战课程', name: 'front.lesson.index' },
    { title: '最近更新', name: 'front.lesson.latest' },
    { title: '话题讨论', name: 'front.topic.index' },
    { title: '签到打卡', name: 'front.sign.index' },
    { title: '订阅会员', name: 'front.subscribe.index' }
]
const docs = [
    { title: 'CSS样式控制', to: `https://houdunren.gitee.io/note/css/1%20%E5%9F%BA%E7%A1%80%E7%9F%A5%E8%AF%86.html` },
    { title: 'JavaScript编程', to: `https://houdunren.gitee.io/note/js/1%20%E5%9F%BA%E7%A1%80%E7%9F%A5%E8%AF%86.html` },
    { title: 'Mysql数据库', to: `https://houdunren.gitee.io/note/mysql/1%20%E5%AD%A6%E5%89%8D%E5%87%86%E5%A4%87.html` },
    { title: 'Git版本控制', to: `https://houdunren.gitee.io/note/git/git.html` },
    {
        title: 'Laravel 框架',
        to: `https://houdunren.gitee.io/note/%E6%89%8B%E5%86%8C/laravel%208.x/1%20%E5%BA%8F%E5%B9%95/1%20%E5%8F%91%E8%A1%8C%E8%AF%B4%E6%98%8E.html`
    },
    { title: 'Homestead环境', to: `https://houdunren.gitee.io/note/homestead/1%20homestead.html` },
    { title: 'Vscode编辑器', to: `https://houdunren.gitee.io/note/vscode/1%20%E5%9F%BA%E7%A1%80%E7%9F%A5%E8%AF%86.html` },
    { title: 'Vim使用', to: `https://houdunren.gitee.io/note/vim/1%20%E5%9F%BA%E6%9C%AC%E4%BD%BF%E7%94%A8.html#%E5%9F%BA%E7%A1%80%E7%9F%A5%E8%AF%86` },
    { title: 'HDCMS开源系统', to: `https://houdunren.gitee.io/note/hdcms/%E5%89%8D%E7%AB%AF/%E7%BC%96%E8%BE%91%E5%99%A8.html` },
    { title: '查看更多文档...', to: `https://houdunren.gitee.io/note/` }
]
export default {
    data() {
        return {
            menus,
            docs
        }
    }
}
</script>

<style></style>
