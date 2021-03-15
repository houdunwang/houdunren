<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-message :wechat="wechat" v-if="wechat.id" />
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: `:sid/:wid/message/index` },
    data() {
        return {
            tabs: tabs(this.$route.params.sid),
            sid: this.$route.params.sid,
            wechat: {}
        }
    },
    async created() {
        this.wechat = await axios.get(`site/${this.sid}}/wechat/${this.$route.params.wid}`)
    }
}
</script>

<style></style>
