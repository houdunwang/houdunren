<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-material :wechat="wechat" v-if="wechat.id" :material-type="$route.query.type" />
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs: tabs(this.$route.query.sid),
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
