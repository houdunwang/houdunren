<template>
    <div>
        <router-view />
    </div>
</template>
<script>
export default {
    route: { meta: { guest: true } },
    provide() {
        return { site: window.site }
    }
}
</script>

<style></style>
