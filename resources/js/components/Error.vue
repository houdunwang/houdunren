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
      this.$warning({
        title: '温馨提示',
        content: messages.join('<br/>')
      })
      //   this.$alert(messages.join('<br/>'), '温馨提示', {
      //     confirmButtonText: '确定',
      //     cancelButtonText: '取消',
      //     dangerouslyUseHTMLString: true,
      //     type: 'warning',
      //     center: true
      //   })
    }
  }
}
</script>
<style lang="scss"></style>
