<template>
    <div class="border-b mb-3">
        <inertia-link class="nav-link px-3" :href="home" v-if="home">
            <i class="fa fa-home text-gray-600" aria-hidden="true"></i>
        </inertia-link>
        <div v-if="menus" class="inline-block">
            <inertia-link
                :href="menu.route"
                v-for="(menu, index) in menus"
                :key="index"
                class="route().current()==menu.link?'bread-active':'bread-link'"
                v-show="currentShow(menu)"
            >
                {{ menu.title }}
            </inertia-link>
        </div>
        <div v-else class="inline-block">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: ["home", "menus", "name"],
    methods: {
        //如果菜单设置了current属性时，只有在为当前路由时显示
        currentShow(menu) {
            return (
                !menu.current ||
                (menu.current && menu.link == route().current())
            );
        },
    },
};
</script>

<style></style>
