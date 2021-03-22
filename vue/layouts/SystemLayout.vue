<template>
    <div style="background-image: url(/images/admin2.jpg)" class="min-h-screen bg-cover bg-top">
        <top-menu />
        <quick-menu />
        <div class="bg-white mx-3 px-5 py-4 shadow-md rounded-sm">
            <router-view />
        </div>
        <x-footer />
        <el-backtop> </el-backtop>
    </div>
</template>
<script>
import TopMenu from './components/TopMenu'
import QuickMenu from './components/QuickMenu'
import XFooter from './components/Footer'

export default {
    route: { meta: { auth: true } },
    components: { TopMenu, QuickMenu, XFooter },
    created() {
        this.$store.dispatch('systemConfig')
    }
}
</script>

<style></style>
