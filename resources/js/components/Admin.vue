<template>
    <div class="hdcms">
        <navigate/>
        <quick-menu class="m-3 mt-5"/>
        <div class="card m-2 m-3 mt-5">
            <div class="card-body">
                <transition name="slide-fade">
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
    import store from "../store/index";
    import {Message} from "element-ui";
    import {mapState, mapMutations} from "vuex";

    export default {
        async beforeRouteEnter(to, from, next) {
            try {
                await Promise.all([
                    store.dispatch("user/get"),
                    store.dispatch("setting/get")
                ]);
                next();
            } catch (error) {
                Message.error(error);
            }
        },
        computed: {
            ...mapState("setting", ["setting"]),
            ...mapState('error', ['errors'])
        },
        watch: {
            //公共错误提示
            errors(errors) {
                let messages = [];
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        messages =messages.concat(errors[key])
                    }
                }
                this.$alert(messages.join('<br/>'), '温馨提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    dangerouslyUseHTMLString: true,
                    type: 'warning',
                    center: true
                });
            }
        },
        created() {
            window.document.title = this.setting.base.name.value;
        },
        components: {
            Navigate,
            Copyright,
            QuickMenu
        }
    };
</script>
<style lang="scss">
    .hdcms {
        background-image: url("../../images/bg.jpg");
        height: 100vh;
    }
</style>
