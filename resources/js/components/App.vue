<template>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</template>

<script>
export default {
    components: {},
    mounted() {
        console.log("Component mounted.App.vue");
    }
};
</script>
<style lang="scss"></style>
