<template>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item" v-for="(route, index) in tabs" :key="index">
            <router-link
                :to="route"
                class="nav-link text-sm font-bold"
                :class="{ active: $route.name == route.name }"
                v-if="!route.current || route.name == $route.name"
            >
                {{ route.title }}
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['tabs']
}
</script>

<style></style>
