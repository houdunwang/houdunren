<template>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <router-link to="/admin" class="nav-link">站点列表@</router-link>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" :class="{ active: $route.path == '/site/site/create' }">添加站点</a>
        </li>
        <li class="nav-item" v-if="$route.name == 'site.site.edit'">
            <a href="#" class="nav-link active">修改站点</a>
        </li>
    </ul>
</template>

<script>
export default {}
</script>

<style></style>
