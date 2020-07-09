<template>
  <a href :class="className" @click.prevent="del">
    <slot>删除</slot>
  </a>
</template>

<script>
export default {
  props: {
    action: { type: String, required: true },
    className: { type: String, default: 'btn btn-secondary' },
  },
  methods: {
    del() {
      this.$confirm('确定删除吗？', '提示', { type: 'warning' })
        .then(async () => {
          await this.axios.delete(this.action)
          location.reload()
        })
        .catch(() => {})
    },
  },
}
</script>

<style></style>
