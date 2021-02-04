<template>
    <div class="grid justify-items-stretch md:justify-between md:grid-cols-12 items-center px-4 md:py-10 mb-3">
        <div class="logo hidden md:block md:w-96 md:col-span-10">
            <a href="#">
                <img :src="$store.state.config.logo" />
            </a>
        </div>
        <div class="grid grid-flow-col auto-cols-fr gap-1 mt-3 md:mt-0 md:col-span-2">
            <router-link
                v-for="(menu, index) in quickMenus"
                :key="index"
                :to="menu.route"
                class="bg-white border rounded-lg shadow-md box-border px-4 py-2 flex flex-col justify-center items-center opacity-75 duration-500 hover:opacity-100"
            >
                <i class="text-2xl" :class="menu.icon" aria-hidden="true"></i>
                <span class="text-sm">{{ menu.title }}</span>
            </router-link>
            <router-link
                to="/system/index"
                class="bg-white border rounded-lg shadow-md box-border px-4 py-2 flex flex-col justify-center items-center opacity-75 duration-500 hover:opacity-100"
                v-if="user.is_super_admin"
            >
                <i class="text-2xl far fa-life-ring" aria-hidden="true"></i>
                <span class="text-sm">系统设置</span>
            </router-link>
            <a
                href="#"
                class="bg-white border rounded-lg shadow-md box-border px-4 py-2 flex flex-col justify-center items-center opacity-75 duration-500 hover:opacity-100"
                @click.prevent="logout"
            >
                <i class="text-2xl far fa-life-ring" aria-hidden="true"></i>
                <span class="text-sm">退出</span>
            </a>
        </div>
    </div>
</template>

<script>
const quickMenus = [{ title: '网站管理', route: { name: 'site.site.index' }, icon: 'fas fa-sitemap' }]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            quickMenus
        }
    }
}
</script>

<style></style>
