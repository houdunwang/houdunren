<template>
  <div class="card">
    <div class="card-header">表单选项</div>
    <div class="card-body">
      <div class="form-group">
        <label>选项值</label>
        <textarea v-model="field.options" placeholder="格式为 1:男,2:女,3:保密，并且注意符号都要为英文字符" class="form-control" rows="3" required></textarea>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    field: { type: Object, required: true, default: () => {} },
  },
  mounted() {
    if (this.field.options) this.field.options = ''
  },
}
</script>

<style lang="scss">
</style>
