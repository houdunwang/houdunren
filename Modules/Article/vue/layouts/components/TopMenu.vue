<template>
    <header class="navbar navbar-expand-md navbar-dark d-print-none">
        <div class="container-xl max-w-full">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-menu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link d-flex lh-1 text-reset p-0"
                        data-bs-toggle="dropdown"
                        aria-label="Open user menu"
                    >
                        <el-image
                            :src="user.avatar"
                            fit="fill"
                            :lazy="true"
                            class="w-10 h-10 rounded-sm"
                        ></el-image>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ user.name }}</div>
                            <div class="mt-1 small text-muted">
                                注册于{{ user.created_at | fromNow }}
                            </div>
                        </div>
                    </a>

                    <div
                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                        <a href="#" class="dropdown-item">会员中心</a>
                        <div class="dropdown-divider"></div>
                        <a
                            href="#"
                            @click.prevent="logout"
                            class="dropdown-item"
                            >退出登录</a
                        >
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div
                    class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center"
                >
                    <ul class="navbar-nav">
                        <li
                            class="nav-item"
                            v-for="(menu, index) in menus"
                            :key="index"
                        >
                            <router-link class="nav-link" :to="menu.to">
                                <span class="nav-link-title">
                                    <i class="mr-1" :class="menu.icon"></i>
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
    {
        title: "站点列表",
        to: "/admin",
        icon: "fas fa-basketball-ball"
    },
    { title: "模块管理", to: "", icon: "fab fa-bimobject" },
    { title: "会员组", to: "", icon: "fas fa-calendar-check" },
    { title: "系统设置", to: "", icon: "fas fa-camera-retro" }
];
export default {
    data() {
        return {
            menus
        };
    }
};
</script>

<style></style>
