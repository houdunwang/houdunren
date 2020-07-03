<template>
  <a href class="btn btn-secondary" @click.prevent="del">{{ title }}</a>
</template>

<script>
export default {
  props: {
    title: { type: String, default: '删除' },
    action: { type: String, required: true },
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
