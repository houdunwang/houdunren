<template>
  <img v-if="captcha" class="border" :src="captcha" @click.prevent="load" />
</template>
<script>
// 图形验证码
export default {
  data() {
    return {
      captcha: null
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`common/captcha?_` + Math.random())
      this.$set(this, 'captcha', response.data)
    }
  }
}
</script>

<style scoped>
img {
  cursor: pointer;
  height: 35px;
}
</style>
