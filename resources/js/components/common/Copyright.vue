<template>
    <div class="row">
        <div class="col-12 text-center small text-secondary">
            <div class="text-dark">
                {{ setting.base.footer.value }}
            </div>
            <div>
                Powered by hdcms v5.7.0 © 2014-2019 www.hdcms.com
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
