<template></template>
<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState('error', ['data'])
  },
  watch: {
    //公共错误提示
    data(errors) {
      let messages = []
      for (let key in errors) {
        if (Object.prototype.hasOwnProperty.call(errors, key)) {
          messages = messages.concat(errors[key])
        }
      }
      const h = this.$createElement
      this.$warning({
        title: '温馨提示',
        content: h(
          'div',
          {},
          messages.map(m => h('p', { style: { marginBottom: '.5em' } }, m))
        ),
        maskClosable: true
      })
    }
  }
}
</script>
<style lang="scss"></style>
