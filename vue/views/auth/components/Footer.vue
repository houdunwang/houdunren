<template>
    <div class="text-center mt-4" v-if="site.id">
        <a
            href="/wechat/login"
            class="no-underline hover:text-gray-900 text-blue-dark text-xs"
            v-if="site.setting.wechatweb_login && (device.wechat || device.desktop)"
        >
            微信登录 ·
        </a>

        <router-link class="no-underline hover:text-gray-900 text-blue-dark text-xs" to="/register" v-if="$route.name != 'auth.register'">
            注册 ·
        </router-link>

        <router-link class="no-underline hover:text-gray-900 text-blue-dark text-xs" to="/login" v-if="$route.name != 'auth.login'">
            登录 ·
        </router-link>

        <router-link class="no-underline hover:text-gray-900 text-blue-dark text-xs" to="/forget">
            找回密码 ·
        </router-link>

        <a class="no-underline hover:text-gray-900 text-blue-dark text-xs" href="/">
            返回首页
        </a>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    inject: ['site'],
    computed: {
        ...mapState(['device'])
    }
}
</script>

<style></style>
