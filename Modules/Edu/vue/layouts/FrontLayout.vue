<template>
    <div class="page">
        <top-menu />

        <keep-alive>
            <router-view v-if="$route.meta.keepAlive"></router-view>
        </keep-alive>
        <router-view v-if="!$route.meta.keepAlive"></router-view>

        <hd-footer />
        <el-backtop> </el-backtop>
    </div>
</template>

<script>
import TopMenu from './front/TopMenu'
import HdFooter from './front/Footer'
export default {
    components: { TopMenu, HdFooter },
    async created() {
        //站点
        await this.$store.dispatch('site').finally(_ => {
            if (!this.$store.state.site.id) {
                // this.$router.push({ name: 'errors.notfound' })
            }
        })
        //站内消息
        if (this.isLogin) this.$store.dispatch('siteMessage')
    }
}
</script>

<style></style>
