<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-sendall :wechat="wechat" v-if="wechat.id" />
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            wechat: {},
            messages: []
        }
    },
    async created() {
        this.wechat = await axios.get(`site/${this.query('sid')}}/wechat/${this.query('wid')}`)
        this.messages = await axios.get(`site/${this.query('sid')}}/wechat/${this.query('wid')}`)
    }
}
</script>

<style lang="scss"></style>
