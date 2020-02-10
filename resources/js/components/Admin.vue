<template>
    <div class="hdcms">
        <navigate />
        <quick-menu class="m-3 mt-5" />
        <div class="card m-2 m-3 mt-5">
            <div class="card-body">
                <transition name="slide-fade">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
        <copyright />
    </div>
</template>
<script>
import Navigate from "./common/Navigate";
import Copyright from "./common/Copyright";
import QuickMenu from "./common/QuickMenu";
import { mapActions, mapGetters, mapState, mapMutations } from "vuex";
export default {
    components: {
        Navigate,
        Copyright,
        QuickMenu
    },
    methods: {
        ...mapActions("user", ["login"]),
        ...mapMutations("user", ["update"])
    },
    computed: {
        ...mapState("user", ["user"])
    },
    mounted() {
        this.login({
            username: "2300071698@qq.com",
            password: "admin888"
        }).then(() => {
            console.log(this.isLogin);
        });
    }
};
</script>
<style lang="scss">
.hdcms {
    background-image: url("../../images/bg.jpg");
    height: 100vh;
}
</style>
