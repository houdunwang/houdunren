<template>
  <a href="#" @click.prevent="del">
    <slot>删除</slot>
  </a>
</template>

<script>
export default {
  props: {
    action: { type: String, required: true },
    redirect: { type: String, default: '' },
  },
  methods: {
    del() {
      this.$confirm('确定删除吗？', '提示', { type: 'warning' })
        .then(async () => {
          await this.axios.delete(this.action)
          if (this.redirect === '') {
            location.reload()
          } else if (this.redirect === 'back') {
            window.history.go(-1)
          } else if (this.redirect != 'no') {
            location.href = this.redirect
          }
        })
        .catch(() => {})
    },
  },
}
</script>

<style></style>
