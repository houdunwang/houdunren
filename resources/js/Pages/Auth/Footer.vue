<template>
    <div class="text-center mt-4">
        <a class="no-underline hover:underline text-blue-dark text-xs" href="">
            微信登录
        </a>
        ·
        <inertia-link class="no-underline hover:underline text-blue-dark text-xs" :href="route('register')" v-if="route().current() != 'register'">
            注册 ·
        </inertia-link>

        <inertia-link class="no-underline hover:underline text-blue-dark text-xs" :href="route('login')" v-if="route().current() != 'login'">
            登录 ·
        </inertia-link>

        <inertia-link class="no-underline hover:underline text-blue-dark text-xs" :href="route('auth.forget')" v-if="route().current() != 'auth.forget'">
            找回密码 ·
        </inertia-link>

        <a class="no-underline hover:underline text-blue-dark text-xs" href="/">
            返回首页
        </a>
    </div>
</template>

<script>
export default {}
</script>

<style></style>
