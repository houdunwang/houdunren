<template>
    <div class="row mt-5">
        <div class="col-12 text-center small text-secondary">
            <div class="text-dark" v-html="setting.base.footer.value"></div>
            <div>
                Powered by hdcms v6 © 2014-2019 www.hdcms.com
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    computed: {
        ...mapState("setting", ["setting"])
    }
};
</script>

<style></style>
