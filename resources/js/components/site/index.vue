<template>
    <div>
        <router-link :to="{name:'site.add'}" class="btn btn-info mb-3">
            <i class="fa fa-plus"></i> 添加网站
        </router-link>

        <site v-for="site in sites" :key="site.id" :site="site"/>
    </div>
</template>

<script>
    import Site from "./blocks/Site";
    import store from "../../store/index";
    import {mapState} from "vuex";
    import {Message} from "element-ui";

    export default {
        async beforeRouteEnter(to, from, next) {
            try {
                await Promise.all([store.dispatch("site/getLists")]);
                next();
            } catch (error) {
                Message.error(error);
                next(from.path);
            }
        },
        computed: {
            ...mapState("site", ["sites"])
        },

        components: {
            Site
        }
    };
</script>

<style></style>
