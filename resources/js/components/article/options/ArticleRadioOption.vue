<template>
  <div>
    <div class="form-group">
      <label>选项值</label>
      <textarea v-model="data.options" placeholder="格式为 1:男,2:女,3:保密，并且注意符号都要为英文字符" class="form-control" rows="3" required></textarea>
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
