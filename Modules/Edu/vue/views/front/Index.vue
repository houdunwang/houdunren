<template>
    <home />
</template>

<script>
import Home from './Home'
export default {
    route: { path: '/Edu', meta: { keepAlive: true } },
    components: { Home }
}
</script>

<style></style>
