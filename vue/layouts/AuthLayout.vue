<template>
    <div>
        <router-view />
    </div>
</template>
<script>
import { mapState, mapActions } from 'vuex'
export default {
    computed: {
        ...mapState(['site'])
    },
    methods: {
        ...mapActions({
            getSite: 'site'
        })
    },
    async created() {
        await this.getSite()
    }
}
</script>

<style></style>
