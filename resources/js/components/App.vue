<template>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</template>

<script>
import { mapActions } from "vuex";
export default {
    components: {},
    mounted() {
        // this.get()
        //     .then(user => {
        //     })
        //     .catch(_ => {
        //     });
    },
    methods: {
        ...mapActions("user", ["get"])
    }
};
</script>
<style lang="scss"></style>
