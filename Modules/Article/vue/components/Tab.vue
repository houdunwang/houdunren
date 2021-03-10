<template>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item" v-for="(route, index) in tabs" :key="index">
            <a
                href="#"
                @click.prevent="go(route)"
                class="nav-link text-sm font-bold"
                :class="{ active: $route.name == route.name }"
                v-if="!route.current || route.name == $route.name"
            >
                {{ route.title }}
            </a>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['tabs'],
    methods: {
        go(route) {
            //添加历史菜单，包含current属性的不添加（因为一般是编辑菜单）
            if (!route.current) {
                this.$store.commit('addHistoryMenus', {
                    title: route.title,
                    route: { name: route.name }
                })
            }
            if (this.$route.name != route.name) {
                this.$router.push(route)
            }
        }
    }
}
</script>

<style></style>
