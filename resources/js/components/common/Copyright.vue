<template>
    <div class="row mt-5 mb-3">
        <div class="col-12 text-center small text-secondary">
            <div class="text-dark copyright" v-html="setting.base.footer.value"></div>
        </div>
    </div>
</template>

<script>
    import {mapState} from "vuex";

    export default {
        computed: {
            ...mapState("setting", {setting:'data'})
        }
    };
</script>

<style>
    .copyright {
        line-height: 2em;
        font-weight: bold;
        text-shadow: 2px 2px 1px #fff;
    }
</style>
