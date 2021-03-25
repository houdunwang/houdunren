<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-menu :wechat="wechat" v-if="wechat.id" />
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            wechat: {}
        }
    },
    async created() {
        this.wechat = await this.axios.get(`site/${this.$route.query.sid}/wechat/${this.$route.query.wid}`)
    }
}
</script>

<style lang="scss"></style>
