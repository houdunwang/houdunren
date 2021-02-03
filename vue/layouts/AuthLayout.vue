<template>
    <div>
        <router-view />
    </div>
</template>
<script>
export default {
    async beforeRouteEnter(to, from, next) {
        // if (to.name != 'auth.hdcms') {
        //     await axios.get(`site/bydomain`)
        // }
        next()
    }
}
</script>

<style></style>
