<template>
  <div>
    <div class="form-group">
      <label>默认值</label>
      <input type="text" class="form-control" v-model="data.default" />
    </div>
    <div class="form-group">
      <label>验证规则</label>
      <input type="text" class="form-control" v-model="data.regexp" placeholder="正则表达式验证规则" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: { type: Object, required: true, default: () => {} },
  },
  data() {
    return {}
  },
}
</script>

<style lang="scss">
</style>
