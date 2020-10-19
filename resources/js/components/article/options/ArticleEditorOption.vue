<template>
  <div>
    <div class="form-group">
      <label>编辑器类型</label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" v-model="data.type" value="wangEditor" id="wangEditor" />
        <label class="form-check-label" for="wangEditor">wangEditor</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" v-model="data.type" value="tostuiEditor" id="tostuiEditor" />
        <label class="form-check-label" for="tostuiEditor">tostuiEditor</label>
      </div>
    </div>

    <hr />
    <div v-if="data.type == 'wangEditor'">访问<a href="http://www.wangeditor.com/" target="_blank">wangEditor官网</a>了解更多</div>
    <div v-if="data.type == 'tostuiEditor'">访问<a href="https://ui.toast.com/tui-editor/" target="_blank">tostuiEditor官网</a>了解更多</div>
  </div>
</template>

<script>
export default {
  props: {
    data: { type: Object, required: true, default: () => {} },
  },
}
</script>

<style lang="scss">
</style>
