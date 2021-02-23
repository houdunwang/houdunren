<template>
    <div>
        <router-view />
    </div>
</template>
<script>
export default {
    created() {
        this.$store.dispatch('site')
    }
}
</script>

<style></style>
