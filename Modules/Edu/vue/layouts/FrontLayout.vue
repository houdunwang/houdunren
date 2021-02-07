<template>
    <div class="page">
        <top-menu />
        <div class="container-xl mt-16">
            <router-view />
        </div>
        <hd-footer />
    </div>
</template>

<script>
import TopMenu from './front/TopMenu'
import HdFooter from './front/Footer'
export default {
    components: { TopMenu, HdFooter }
}
</script>

<style></style>
