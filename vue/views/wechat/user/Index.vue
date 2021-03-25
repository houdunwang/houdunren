<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-wechat-user :wechat="wechat" v-if="wechat.id" />
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
        this.wechat = await axios.get(`site/${this.query('sid')}/wechat/${this.query('wid')}`)
    },
    methods: {}
}
</script>

<style lang="scss"></style>
