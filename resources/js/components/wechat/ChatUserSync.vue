<template>
  <a href="#" class="btn btn-outline-primary" @click.prevent="get(0)">同步粉丝</a>
</template>

<script>
export default {
  props: {
    site_id: { type: Number, required: true },
    wechat_id: { type: Number, required: true },
  },
  data() {
    return {}
  },
  methods: {
    async get(next_openid = null) {
      const response = await this.axios.get(`site/wechat/${this.site_id}/user/sync/${this.wechat_id}/${next_openid}`)

      if (response.state == 1) {
        return this.$message.info('微信粉丝同步完成')
      }
      this.get(response.next_openid)
    },
  },
}
</script>
<style lang="scss">
</style>
