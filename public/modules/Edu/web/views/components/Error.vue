<template> </template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('error', ['data'])
  },
  watch: {
    data(errors) {
      let messages = []
      for (const key in errors) {
        if (Object.prototype.hasOwnProperty.call(errors, key)) {
          messages = messages.concat(errors[key])
        }
      }
      this.$alert(messages.join('<br/>'), '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        dangerouslyUseHTMLString: true,
        type: 'warning',
        center: true
      })
    }
  }
}
</script>

<style></style>
