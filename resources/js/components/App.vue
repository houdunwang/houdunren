<template>
    <div class="hdcms">
        <navigate />
        <quick-menu class="m-3 mt-5" />
        <div class="card m-2 mt-5 ">
            <div class="card-body">
                <router-view></router-view>
            </div>
        </div>
        <copyright />
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
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
<style lang="scss"></style>
