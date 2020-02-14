<template>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</template>
<script>
    import {mapState} from "vuex";

    export default {
        computed: {
            ...mapState('error', ['errors'])
        },
        watch: {
            //公共错误提示
            errors(errors) {
                let messages = [];
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        messages = messages.concat(errors[key])
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
        }
    };

</script>
<style lang="scss"></style>
