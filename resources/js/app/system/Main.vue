<template>
    <div class="admin-container">
        <navigate/>
        <quick-menu class="m-3 mt-5"/>
        <div class="card m-2 m-3 mt-5">
            <div class="card-body">
                <transition name="slide">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
        <copyright/>
    </div>
</template>
<script>
    import Navigate from "../components/Navigate";
    import Copyright from "../components/Copyright";
    import QuickMenu from "../components/QuickMenu";

    export default {
        components: {
            Navigate,
            Copyright,
            QuickMenu
        }
    };
</script>
<style lang="scss" scoped>
    .admin-container {
        background-image: url("../../images/bg.jpg");
        height: 100vh;
    }
</style>
