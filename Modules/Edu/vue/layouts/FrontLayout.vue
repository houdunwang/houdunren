<template>
    <div class="page">
        <top-menu />
        <router-view />
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
