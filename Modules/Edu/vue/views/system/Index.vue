<template>
    <div>
        <div v-for="(menu, index) in menus" :key="index">
            <div class="mb-5">
                <h6 class="border-l-4 border-gray-600 pl-2 mb-3 text-sm">{{ menu.title }}</h6>
                <section class="flex">
                    <router-link
                        :to="m.to"
                        v-for="(m, n) in menu.items"
                        :key="n"
                        class="flex flex-col justify-center items-center w-28 h-20 border rounded-md shadow-sm mr-3 text-gray-700 text-base"
                    >
                        <i class="text-gray-500 text-3xl" :class="m.icon" aria-hidden="true"></i>
                        <span class="text-sm font-bold text-gray-600 mt-1">{{ m.title }}</span>
                    </router-link>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
const menus = [
    {
        title: '应用扩展',
        items: [
            { title: '模块插件', to: '/system/module/index', icon: 'fa fa fa-cubes' },
            { title: '风格模板', to: '', icon: 'fas fa-basketball-ball' }
        ]
    },
    {
        title: '用户管理',
        items: [
            { title: '我的帐户', to: '/system/my/edit', icon: 'fas fa-eraser' },
            { title: '用户组管理', to: '/system/group/index', icon: 'fas fa-drum-steelpan' },
            { title: '服务套餐', to: '/system/package/index', icon: 'fas fa-disease' }
        ]
    },
    {
        title: '系统管理',
        items: [
            { title: '站点列表', to: '/admin', icon: 'fas fa-cube' },
            { title: '系统配置', to: '/system/config/update', icon: 'fas fa-clinic-medical' }
        ]
    }
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
