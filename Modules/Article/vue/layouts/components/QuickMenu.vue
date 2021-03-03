<template>
    <div
        class="mx-5 flex flex-col justify-between items-center md:flex-row mt-8"
    >
        <div class="w-3/12 hidden md:block">
            <img src="/images/logo.png" class="object-cover" />
        </div>
        <div class="w-full md:w-3/12 grid gap-2 grid-cols-3">
            <router-link
                :to="menu.to"
                v-for="(menu, index) in menus"
                :key="index"
                class="cursor-pointer opacity-60 hover:opacity-95 duration-300 flex flex-col justify-center items-center bg-white rounded-md border shadow-sm p-3"
            >
                <i class="text-2xl" :class="menu.icon"></i>
                {{ menu.title }}
            </router-link>
            <a
                href="#"
                @click.prevent="logout"
                class="cursor-pointer opacity-60 hover:opacity-95 duration-300 flex flex-col justify-center items-center bg-white rounded-md border shadow-sm p-3"
            >
                <i class="text-2xl fas fa-user-alt"></i>
                退出
            </a>
        </div>
    </div>
</template>

<script>
const menus = [
    {
        title: "站点管理",
        to: "/site/site/index",
        icon: "fas fa-calendar-check"
    },
    { title: "系统设置", to: "/system/home", icon: "fas fa-cloud" }
];
export default {
    data() {
        return { menus };
    }
};
</script>

<style></style>
