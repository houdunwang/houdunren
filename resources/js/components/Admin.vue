<template>
    <div class="hdcms">
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
    import Navigate from "./common/Navigate";
    import Copyright from "./common/Copyright";
    import QuickMenu from "./common/QuickMenu";

    export default {
        components: {
            Navigate,
            Copyright,
            QuickMenu
        }
    };
</script>
<style lang="scss">
    body {
        background-image: url("../../images/bg.jpg");
        height: 100vh;
    }
</style>
