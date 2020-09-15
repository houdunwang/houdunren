<template>
  <div>
    <div class="card mb-3">
      <div class="card-header">选择公众号</div>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">微信公众号</label>
          <select class="form-control" id="exampleFormControlSelect1" size="3" v-model="wechat_id">
            <option
              v-for="(wechat,index) in wechats"
              :key="index"
              :value="wechat.id"
            >{{ wechat.title }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: { type: Number },
  },
  data() {
    return {
      wechats: [],
      wechat_id: this.id,
    }
  },
  mounted() {
    this.loadChats()
  },
  watch: {
    id: {
      handler(n) {
        this.wechat_id = n
      },
      immediate: true,
    },
    wechat_id(id) {
      this.$emit('update:id', id)
    },
  },
  methods: {
    async loadChats() {
      this.wechats = await this.axios.get(`wechat/rule/wechat`)
    },
  },
}
</script>

<style lang="scss">
</style>
