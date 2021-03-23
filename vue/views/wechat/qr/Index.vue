<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-qr :wechat="wechat" v-if="wechat.id" />
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            sid: this.$route.query.sid,
            wechat: {}
        }
    },
    async created() {
        this.wechat = await axios.get(`site/${this.sid}/wechat/${this.$route.query.wid}`)
    }
}
</script>

<style></style>
