<template>
    <div>
        <div v-for="(menu, index) in menus" :key="index">
            <div class="mb-5">
                <h6 class="border-l-4 border-gray-600 pl-2 mb-3 text-sm">{{ menu.title }}</h6>
                <section class="flex">
                    <inertia-link
                        :href="m.route"
                        v-for="(m, n) in menu.items"
                        :key="n"
                        class="flex flex-col justify-center items-center w-28 h-20 border rounded-md shadow-sm mr-3 text-gray-700 text-base"
                    >
                        <i class="text-gray-500 text-3xl " :class="m.icon" aria-hidden="true"></i>
                        <span class="text-sm font-bold text-gray-600 mt-1">{{ m.title }}</span>
                    </inertia-link>
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
            { title: '模块插件', route: route('system.module.index'), icon: 'fa fa fa-cubes' },
            { title: '风格模板', route: route('system.module.index'), icon: 'fas fa-basketball-ball' }
        ]
    },
    {
        title: '用户管理',
        items: [
            { title: '我的帐户', route: route('system.my.edit'), icon: 'fas fa-eraser' },
            { title: '用户组管理', route: route('system.group.index'), icon: 'fas fa-drum-steelpan' },
            { title: '服务套餐', route: route('system.package.index'), icon: 'fas fa-disease' }
        ]
    },
    {
        title: '系统管理',
        items: [
            { title: '站点列表', route: route('site.site.index'), icon: 'fas fa-cube' },
            { title: '系统配置', route: route('system.config.edit'), icon: 'fas fa-clinic-medical' }
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

<style lang="scss">
// .container {
//     div {
//         &:nth-child(n + 2) > h6 {
//             @apply mt-8;
//         }
//         h6 {
//             @apply border-l-8 border-gray-600 pl-2 mb-3;
//         }

//         section {
//             @apply flex;
//             a {
//                 @apply flex flex-col justify-center items-center w-32 h-24 border rounded-md shadow-sm mr-3 text-gray-700 text-base;
//                 i {
//                     @apply text-gray-600;
//                 }
//                 span.title {
//                     @apply text-sm;
//                 }
//             }
//         }
//     }
// }
</style>
